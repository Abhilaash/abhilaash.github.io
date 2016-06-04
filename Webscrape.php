<!doctype html>
	<html>
	<head>
		<h1 align="center">Webscrape<br></h1>
			<title>
				Webscrape
			</title>
	</head>
	<body>
		<center>
	<form method="get" action="Webscrape.php">
	Zip Code: 
	<input name="textfield" type="text">
	<span>        </span>
	<button id="getdata" name="getdata" accesskey="r" type="submit"><u>R</u>etrieve data</button>
	<br>
	<br>
	<br>
	<br>
	</form>
	</center>
	</body>
	<?php

	class Database extends SQLite3 {
		function __construct() {
			$this->open('data.db', SQLITE3_OPEN_READWRITE);
		}
	}

	if(array_key_exists("textfield", $_REQUEST)){
		$searchquery = $_REQUEST["textfield"];
		$data = getData($searchquery);
	}

	function getData($searchquery) {
		$db = new Database();
		$db->exec("CREATE TABLE IF NOT EXISTS weather (time TEXT PRIMARY KEY, location TEXT, high INT, low INT, actual INT, type TEXT, pressure REAL)");
		$allwebsitedata = file_get_contents("http://www.wunderground.com/cgi-bin/findweather/getForecast?query=".$searchquery);
		$currenttempregex = '#<meta property="og:title" content="\s*(.+?)"\s*/>#';
		$pressureregex = '#"pressure":\s*?(.+?),#';
		preg_match($currenttempregex, $allwebsitedata, $currenttemp);
		preg_match($pressureregex, $allwebsitedata, $pressure);
		$imploded = implode($currenttemp);
		$array = explode(" | ", $imploded);
		$dataarray = array(substr($array[0], 35));
		$displayarray = array("Location: ".$dataarray[0]);
		array_push($dataarray, substr($array[1], 0, strlen($array[1]) - 5));
		array_push($displayarray, "Current Temperature: ".$dataarray[1]."&deg F");
		array_push($dataarray, $array[4]);
		array_push($displayarray, "Current Conditions: ".$array[4]);
		array_push($dataarray, substr($pressure[1], 1, strlen($pressure[1])));
		array_push($displayarray, "Pressure:".$pressure[1]." in.");
		$allwebsitedata = file_get_contents("http://api.wunderground.com/api/bb18dcca18f57eba/forecast/q/".$searchquery.".json");
		echo("Weather from: www.wunderground.com");
		$json = json_decode($allwebsitedata, true);
		$day = $json['forecast']['simpleforecast']['forecastday'];
		$tempmin = $json['forecast']['simpleforecast']['forecastday'][0]['low']['fahrenheit'];
		array_push($dataarray, $tempmin);
		array_push($displayarray, 'Minimum Temperature: '.$tempmin.' &degF'."\r\n");
		$tempmax = $json['forecast']['simpleforecast']['forecastday'][0]['high']['fahrenheit'];
		array_push($dataarray, $tempmax);
		array_push($displayarray, 'Maximum Temperature: '.$tempmax.' &degF'."\r\n");
		$datapoint;
		$time = date("n/d/Y H:i");
		if($tempmin != ''){
		$tbl = "<table>";
		
		$myfile = fopen("data.txt", "a+");
		fwrite($myfile, $time."\r\n");
		foreach($displayarray as $datapoint){
			$tbl .= "<tr>"."<td>".$datapoint."</td></tr>\n";
		}
		foreach($dataarray as $datapoint){
			fwrite($myfile, $datapoint."\r\n");
		}
		$tbl .= "</table>";
		echo($tbl);

		$db->exec("DELETE FROM weather WHERE time = '$time'");
		$db->exec("INSERT INTO weather VALUES ('$time', '$dataarray[0]', '$dataarray[5]', '$dataarray[4]', '$dataarray[1]', '$dataarray[2]', '$dataarray[3]')");
		$ret = $db->query("SELECT * FROM weather");
		echo('<br><br><br><br>Database data<br>');
		$dbtbl = "<table border=3>";
		$dbtbl .= "<tr>";
		$dbtbl .= "<td align=center>"."Time Updated"."</td>";
		$dbtbl .= "<td align=center>"."Location"."</td>";
		$dbtbl .= "<td align=center>"."High Temperature"."</td>";
		$dbtbl .= "<td align=center>"."Low Temperature"."</td>";
		$dbtbl .= "<td align=center>"."Actual Temperature"."</td>";
		$dbtbl .= "<td align=center>"."Type of weather"."</td>";
		$dbtbl .= "<td align=center>"."Pressure"."</td>";
		$dbtbl .= "</tr>";
		while($row = $ret->fetchArray(SQLITE3_ASSOC)){
			$dbtbl .= "<tr>";
			$dbtbl .= ("<td align=center>".$row['time']."</td>");
			$dbtbl .= ("<td align=center>".$row['location']."</td>");
			$dbtbl .= ("<td align=center>".$row['high']." &degF </td>");
			$dbtbl .= ("<td align=center>".$row['low']." &degF </td>");
			$dbtbl .= ("<td align=center>".$row['actual']." &degF </td>");
			$dbtbl .= ("<td align=center>".$row['type']."</td>");
			$dbtbl .= ("<td align=center>".$row['pressure']." in."."</td>");
			$dbtbl .= "</tr>";
		}
		$dbtbl .= "</table>";
		echo($dbtbl);
	}
		else{
			echo("Not a valid zip code");
		}
	}
	?>
	</html>
