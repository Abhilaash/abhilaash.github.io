<!DOCTYPE html>
<html>
    <head>
        <title> Food </title>
	</head>
	<h1>Please Enter Food</h1>
	<body>
	<form method="POST" action="website.php"><br>
	Food Name: <input type="text" name="foodname"><br><br>
	<button type="submit" id = "finddata" accesskey = "l" >Submit</button>
	</form><br><br><br>
	<form>

	</body>
	<?php
		class Database extends SQLite3 {
			function __construct() {
				$this -> open('fooddata.db', SQLITE3_OPEN_READWRITE);
			}
		}
		if(array_key_exists("foodname", $_REQUEST)){
			$food = $_REQUEST["foodname"];
			$data = putindatabase($food);
		}

	function putindatabase($food){
		$allwebsitedata = file_get_contents("https://api.nutritionix.com/v1_1/search/".$food."?results=0%3A20&fields=item_name%2Cbrand_name%2Citem_id%2Cbrand_id&appId=73935663&appKey=6c47dc559cad5ee6a08d8ec9903b1871");
		$jsondata = json_decode($allwebsitedata, true);
		if(count($jsondata['hits']) > 0){
			$ssq = $jsondata['hits'][0]['fields']['nf_serving_size_qty'];
			$ssqu = $jsondata['hits'][0]['fields']['nf_serving_size_unit'];
			$ss = $ssq.' '.$ssqu;
			$brand = $jsondata['hits'][0]['fields']['brand_name'];
			// print_r($jsondata['hits']);
			// print_r($jsondata['hits'][0]);
			$db = new Database();
			$db -> exec("CREATE TABLE IF NOT EXISTS foods (foodname TEXT PRIMARY KEY, servingsize INTEGER, brand TEXT)");
			$stmt = $db->prepare("INSERT INTO foods VALUES (:fn, :ss, :brand)");
			$stmt -> bindValue(':fn', $food);
			$stmt -> bindValue(':ss', $ss);
			$stmt -> bindValue(':brand', $brand);
			$stmt -> execute();
			$datapoint;	
			$ret = $db->query("SELECT * FROM foods");
			$row;
			$dbtbl = "<table border=3>";
			$dbtbl .= "<tr>";
			$dbtbl .= "<td align=center>"."Food Name"."</td>";
			$dbtbl .= "<td align=center>"."Serving Size"."</td>";
			$dbtbl .= "<td align=center>"."Brand"."</td>";
			$dbtbl .= "<td align=center>"."Delete"."</td>";
			$dbtbl .= "</tr>";
			while($row = $ret->fetchArray(SQLITE3_ASSOC)){
       	  		$dbtbl .= "<tr>";
				$dbtbl .= ("<td align=center>".$row['foodname']."</td>");
				$dbtbl .= ("<td align=center>".$row['servingsize']."</td>");
				$dbtbl .= ("<td align=center>".$row['brand']."</td>");
				$dbtbl .= ("<td align=center><input type = 'submit' id = '".$row['foodname']."'' value = 'delete'></td>");
						  // ("<button type="submit" id = '".$row['foodname']."'>Delete</button>");

				// $dbtbl .= ("<input type='submit' id= '" . $row['foodname'] . "' value='delete' >");
				$dbtbl .= "</tr>";
   			}
   			$dbtbl .= "</table>";
			echo($dbtbl);
		}
		else{
			echo('invalid food name');
		}
	}

	?>
</html>
	