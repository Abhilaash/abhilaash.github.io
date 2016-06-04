<!DOCTYPE html>
<html lang="en">
	<head>
		<?php
		session_start();
		?>
	  <title>Need 2 Meet</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	</head>

	<body>

		<br>
		<div class="container">
		  	<div class="row">
		  		<?php
		  		if (empty($_POST['searchbar'])) 
		    		header('Location: failedsearch.php');;
		  		$searchedEvent = $_POST['searchbar'];
		  		echo "<center><h1>".$searchedEvent."</h1></center>";
		  		?>
			</div>
		  	<div class = "row">
						<div class = "col-sm-12">
			    		<?php
			    		$db = new Database();
			    		$searchedEvent = $_POST['searchbar'];
			    		$ret = $db->query("SELECT * FROM event WHERE Event_Name='$searchedEvent';");
			    		while($elements = $ret->fetchArray(SQLITE3_ASSOC))
			    		{
			    			$start = $elements['Start_Day'];
			    			$month = substr($start, 0, 2);
			    			$day = substr($start, 3, 2);
			    			echo "<center><h3>".$month."/".$day."&nbsp&nbsp&nbsp&nbsp&nbsp".$month."/".(intval($day) + 1)."&nbsp&nbsp&nbsp&nbsp&nbsp".$month."/".(intval($day) + 2)."&nbsp&nbsp&nbsp&nbsp&nbsp".$month."/".(intval($day) + 3)."&nbsp&nbsp&nbsp&nbsp&nbsp".$month."/".(intval($day) + 4)."&nbsp&nbsp&nbsp&nbsp&nbsp".$month."/".(intval($day) + 5)."&nbsp&nbsp&nbsp&nbsp&nbsp".$month."/".(intval($day) + 6)."</h3><center>";	 
			    		}
			    		?>   			
			    	</div>
			    	<div align="center">
			    	
					<div class = "row">
						<div class = "col-sm-12">
			    		<button id = "1x8" class="btn btn-default" type="button" onclick = "changeColor(this.id)">08:00 AM</button>
			    		<button id = "2x8" class="btn btn-default" type="button" onclick = "changeColor(this.id)">08:00 AM</button>
			    		<button id = "3x8" class="btn btn-default" type="button" onclick = "changeColor(this.id)">08:00 AM</button>
			    		<button id = "4x8" class="btn btn-default" type="button" onclick = "changeColor(this.id)">08:00 AM</button>
			    		<button id = "5x8" class="btn btn-default" type="button" onclick = "changeColor(this.id)">08:00 AM</button>
			    		<button id = "6x8" class="btn btn-default" type="button" onclick = "changeColor(this.id)">08:00 AM</button>
			    		<button id = "7x8" class="btn btn-default" type="button" onclick = "changeColor(this.id)">08:00 AM</button>
			    		</div>
			    			
			    	</div>
		    		<div class = "row">
		    			<div class = "col-sm-12">
			    		<button id = "1x9" class="btn btn-default" type="button" onclick = "changeColor(this.id)"> 09:00 AM</button>
			    		<button id = "2x9" class="btn btn-default" type="button" onclick = "changeColor(this.id)"> 09:00 AM</button>
			    		<button id = "3x9" class="btn btn-default" type="button" onclick = "changeColor(this.id)"> 09:00 AM</button>
			    		<button id = "4x9" class="btn btn-default" type="button" onclick = "changeColor(this.id)"> 09:00 AM</button>
			    		<button id = "5x9" class="btn btn-default" type="button" onclick = "changeColor(this.id)"> 09:00 AM</button>
			    		<button id = "6x9" class="btn btn-default" type="button" onclick = "changeColor(this.id)"> 09:00 AM</button>
			    		<button id = "7x9" class="btn btn-default" type="button" onclick = "changeColor(this.id)"> 09:00 AM</button>
			    		</div>
		    		</div>
		    		<div class = "row">
		    			<div class = "col-sm-12">
			    		<button id = "1x10" class="btn btn-default" type="button" onclick = "changeColor(this.id)">10:00 AM</button>
		    			<button id = "2x10" class="btn btn-default" type="button" onclick = "changeColor(this.id)">10:00 AM</button>
			    		<button id = "3x10" class="btn btn-default" type="button" onclick = "changeColor(this.id)">10:00 AM</button>
			    		<button id = "4x10" class="btn btn-default" type="button" onclick = "changeColor(this.id)">10:00 AM</button>
			    		<button id = "5x10" class="btn btn-default" type="button" onclick = "changeColor(this.id)">10:00 AM</button>
			    		<button id = "6x10" class="btn btn-default" type="button" onclick = "changeColor(this.id)">10:00 AM</button>
			    		<button id = "7x10" class="btn btn-default" type="button" onclick = "changeColor(this.id)">10:00 AM</button>
			    		</div>

		    		</div>
		    		<div class = "row">
		    			<div class = "col-sm-12">		    			
		    			<button id = "1x11" class="btn btn-default" type="button" onclick = "changeColor(this.id)">11:00 AM</button>
		    			<button id = "2x11" class="btn btn-default" type="button" onclick = "changeColor(this.id)">11:00 AM</button>
		    			<button id = "3x11" class="btn btn-default" type="button" onclick = "changeColor(this.id)">11:00 AM</button>
		    			<button id = "4x11" class="btn btn-default" type="button" onclick = "changeColor(this.id)">11:00 AM</button>
		    			<button id = "5x11" class="btn btn-default" type="button" onclick = "changeColor(this.id)" >11:00 AM</button>
		    			<button id = "6x11" class="btn btn-default" type="button" onclick = "changeColor(this.id)">11:00 AM</button>
		    			<button id = "7x11" class="btn btn-default" type="button" onclick = "changeColor(this.id)">11:00 AM</button>
		    			</div>
		    		</div>
		    		<div class = "row">
		    			<div class = "col-sm-12">		    			
		    			<button id = "1x12" class="btn btn-default" type="button" onclick = "changeColor(this.id)">12:00 PM</button>
			    		<button id = "2x12" class="btn btn-default" type="button" onclick = "changeColor(this.id)">12:00 PM</button>
			    		<button id = "3x12" class="btn btn-default" type="button" onclick = "changeColor(this.id)">12:00 PM</button>
			    		<button id = "4x12" class="btn btn-default" type="button" onclick = "changeColor(this.id)">12:00 PM</button>
			    		<button id = "5x12" class="btn btn-default" type="button" onclick = "changeColor(this.id)">12:00 PM</button>
			    		<button id = "6x12" class="btn btn-default" type="button" onclick = "changeColor(this.id)">12:00 PM</button>
			    		<button id = "7x12" class="btn btn-default" type="button" onclick = "changeColor(this.id)">12:00 PM</button>
			    		</div>
		    		</div>
		    		<div class = "row">
		    			<div class = "col-sm-12">		    			
		    			<button id = "1x1" class="btn btn-default" type="button" onclick = "changeColor(this.id)">01:00 PM</button>
			    		<button id = "2x1" class="btn btn-default" type="button" onclick = "changeColor(this.id)">01:00 PM</button>
			    		<button id = "3x1" class="btn btn-default" type="button" onclick = "changeColor(this.id)">01:00 PM</button>
			    		<button id = "4x1" class="btn btn-default" type="button" onclick = "changeColor(this.id)">01:00 PM</button>
			    		<button id = "5x1" class="btn btn-default" type="button" onclick = "changeColor(this.id)">01:00 PM</button>
			    		<button id = "6x1" class="btn btn-default" type="button" onclick = "changeColor(this.id)">01:00 PM</button>
			    		<button id = "7x1" class="btn btn-default" type="button" onclick = "changeColor(this.id)">01:00 PM</button>
			    		</div>
		    		</div>
		    		<div class = "row">
		    			<div class = "col-sm-12">	
		    			<button id = "1x2" class="btn btn-default" type="button" onclick = "changeColor(this.id)">02:00 PM</button>
			    		<button id = "2x2" class="btn btn-default" type="button" onclick = "changeColor(this.id)">02:00 PM</button>
			    		<button id = "3x2" class="btn btn-default" type="button" onclick = "changeColor(this.id)">02:00 PM</button>
			    		<button id = "4x2" class="btn btn-default" type="button" onclick = "changeColor(this.id)">02:00 PM</button>
			    		<button id = "5x2" class="btn btn-default" type="button" onclick = "changeColor(this.id)">02:00 PM</button>
			    		<button id = "6x2" class="btn btn-default" type="button" onclick = "changeColor(this.id)">02:00 PM</button>
			    		<button id = "7x2" class="btn btn-default" type="button" onclick = "changeColor(this.id)">02:00 PM</button>
			    		</div>
		    		</div>
		    		<div class = "row">
		    			<div class = "col-sm-12">	
		    			<button id = "1x3" class="btn btn-default" type="button" onclick = "changeColor(this.id)">03:00 PM</button>
			    		<button id = "2x3" class="btn btn-default" type="button" onclick = "changeColor(this.id)">03:00 PM</button>
			    		<button id = "3x3" class="btn btn-default" type="button" onclick = "changeColor(this.id)">03:00 PM</button>
			    		<button id = "4x3" class="btn btn-default" type="button" onclick = "changeColor(this.id)">03:00 PM</button>
			    		<button id = "5x3" class="btn btn-default" type="button" onclick = "changeColor(this.id)">03:00 PM</button>
			    		<button id = "6x3" class="btn btn-default" type="button" onclick = "changeColor(this.id)">03:00 PM</button>
			    		<button id = "7x3" class="btn btn-default" type="button" onclick = "changeColor(this.id)">03:00 PM</button>
			    		</div>
		    		</div>
					<div class = "row">
		    			<div class = "col-sm-12">	
						<button id = "1x4" class="btn btn-default" type="button" onclick = "changeColor(this.id)">04:00 PM</button>
			    		<button id = "2x4" class="btn btn-default" type="button" onclick = "changeColor(this.id)">04:00 PM</button>
			    		<button id = "3x4" class="btn btn-default" type="button" onclick = "changeColor(this.id)">04:00 PM</button>
			    		<button id = "4x4" class="btn btn-default" type="button" onclick = "changeColor(this.id)">04:00 PM</button>
			    		<button id = "5x4" class="btn btn-default" type="button" onclick = "changeColor(this.id)">04:00 PM</button>
			    		<button id = "6x4" class="btn btn-default" type="button" onclick = "changeColor(this.id)">04:00 PM</button>
			    		<button id = "7x4" class="btn btn-default" type="button" onclick = "changeColor(this.id)">04:00 PM</button>
			    		</div>
		    		</div>
		    		<div class = "row">
		    			<div class = "col-sm-12">	
		    			<button id = "1x5" class="btn btn-default" type="button" onclick = "changeColor(this.id)">05:00 PM</button>
			    		<button id = "2x5" class="btn btn-default" type="button" onclick = "changeColor(this.id)">05:00 PM</button>
			    		<button id = "3x5" class="btn btn-default" type="button" onclick = "changeColor(this.id)">05:00 PM</button>
			    		<button id = "4x5" class="btn btn-default" type="button" onclick = "changeColor(this.id)">05:00 PM</button>
			    		<button id = "5x5" class="btn btn-default" type="button" onclick = "changeColor(this.id)">05:00 PM</button>
			    		<button id = "6x5" class="btn btn-default" type="button" onclick = "changeColor(this.id)">05:00 PM</button>
			    		<button id = "7x5" class="btn btn-default" type="button" onclick = "changeColor(this.id)">05:00 PM</button>
			    		</div>
		    		</div>
		    		<div class = "row">
		    			<div class = "col-sm-12">			    			
		    			<button id = "1x6" class="btn btn-default" type="button" onclick = "changeColor(this.id)">06:00 PM</button>
			    		<button id = "2x6" class="btn btn-default" type="button" onclick = "changeColor(this.id)">06:00 PM</button>
			    		<button id = "3x6" class="btn btn-default" type="button" onclick = "changeColor(this.id)">06:00 PM</button>
			    		<button id = "4x6" class="btn btn-default" type="button" onclick = "changeColor(this.id)">06:00 PM</button>
			    		<button id = "5x6" class="btn btn-default" type="button" onclick = "changeColor(this.id)">06:00 PM</button>
			    		<button id = "6x6" class="btn btn-default" type="button" onclick = "changeColor(this.id)">06:00 PM</button>
			    		<button id = "7x6" class="btn btn-default" type="button" onclick = "changeColor(this.id)">06:00 PM</button>
			    		</div>
		    		</div>
		    		<div class = "row">
		    			<div class = "col-sm-12">	
		    			<button id = "1x7" class="btn btn-default" type="button" onclick = "changeColor(this.id)">07:00 PM</button>
			    		<button id = "2x7" class="btn btn-default" type="button" onclick = "changeColor(this.id)">07:00 PM</button>
			    		<button id = "3x7" class="btn btn-default" type="button" onclick = "changeColor(this.id)">07:00 PM</button>
			    		<button id = "4x7" class="btn btn-default" type="button" onclick = "changeColor(this.id)">07:00 PM</button>
			    		<button id = "5x7" class="btn btn-default" type="button" onclick = "changeColor(this.id)">07:00 PM</button>
			    		<button id = "6x7" class="btn btn-default" type="button" onclick = "changeColor(this.id)">07:00 PM</button>
			    		<button id = "7x7" class="btn btn-default" type="button" onclick = "changeColor(this.id)">07:00 PM</button>
			    		</div>
		    		</div>
		    		<div class = "row">
		    			<div class = "col-sm-12">	
		    			<button id = "1x8p" class="btn btn-default" type="button" onclick = "changeColor(this.id)">08:00 PM</button>
			    		<button id = "2x8p" class="btn btn-default" type="button" onclick = "changeColor(this.id)">08:00 PM</button>
			    		<button id = "3x8p" class="btn btn-default" type="button" onclick = "changeColor(this.id)">08:00 PM</button>
			    		<button id = "4x8p" class="btn btn-default" type="button" onclick = "changeColor(this.id)">08:00 PM</button>
			    		<button id = "5x8p" class="btn btn-default" type="button" onclick = "changeColor(this.id)">08:00 PM</button>
			    		<button id = "6x8p" class="btn btn-default" type="button" onclick = "changeColor(this.id)">08:00 PM</button>
			    		<button id = "7x8p" class="btn btn-default" type="button" onclick = "changeColor(this.id)">08:00 PM</button>
			    		</div>
		    		</div>
		    	</div>
		    	</div>

		</div>
		<br>
		    	<div align="center">
				<form method="get" action="need2meet.php">

		    		<h1>Address</h1>
		    		
		    		<input name="Name" type="text" placeholder="Name" ><br><br>
		    		<input name="Phone" type="text" placeholder="Phone Number" ><br><br>
		    		<input name="House" type="text" placeholder="House Number" >&nbsp&nbsp
		    		<input name="Street" type="text" placeholder="Street Name"><br><br>
	    				<input name="City" type="text" placeholder="City">&nbsp&nbsp
	    				<input name="State" type="text" placeholder="State"> 
		    
		    		<br>
		    		<br>
		    		<button class="btn btn-default" type="submit">Submit</button>
		    				</div>
		    	</form>
			    </div>
			    <div align="center">

			    	<h1>Admin Only</h1> <div class="input-group"> 
			    	<input type="text" placeholder="Admin access code"> <br><br>
			    	<button class="btn btn-default"><a href="final.php">Access</a></button> 
			    </div> </div>
			 </div>
			 <br><br><br>
		</div>




	</body>
	<script>
	var timeArray = {};

	function changeColor(a){
		if(document.getElementById(a).className == "btn btn-default"){
			document.getElementById(a).className = "btn btn-success";
		}
		else{
			document.getElementById(a).className = "btn btn-default";
		}
	}

	function getData(){
		for(var day = 1 ;  day < 8 ; day ++){
			for(var hour = 8 ; hour < 13; hour ++){
				var b = day + "x" + hour
				if(document.getElementById(b).className == "btn btn-success"){
					timeArray[b] = true;				
				}
				else{
					timeArray[b] = false;
				}
				console.log(b);
				console.log(timeArray[b])
			}
			for(var hour = 1 ; hour < 8; hour ++){
				var b = day + "x" + hour
				if(document.getElementById(b).className == "btn btn-success"){
					timeArray[b] = true;				
				}
				else{
					timeArray[b] = false;
				}
			}
				var b = day + "x8p";
				if(document.getElementById(b).className == "btn btn-success"){
					timeArray[b] = true;				
				}
				else{
					timeArray[b] = false;
				}
			}
		}
		</script>
	</html>
	<?php
	$event;
	$description;
	$password;
	$start;
	$duration;
	class Database extends SQLite3 {
		function __construct() {
			$this->open('eventdata.db', SQLITE3_OPEN_READWRITE);
		}
	}

	if(array_key_exists("searchbar", $_POST)){
		$data = search($_POST["searchbar"]);
	}

	function search($eventsearched){
		$db = new Database();
		$db->exec("CREATE TABLE IF NOT EXISTS event (Event_Name TEXT PRIMARY KEY, Description TEXT, Password TEXT, Start_Day INTEGER, Duration INTEGER)");
		$ret = $db->query("SELECT Event_Name, Description, Password, Start_Day, Duration FROM event");
		$success = false;
		while($elements = $ret->fetchArray(SQLITE3_ASSOC)){
			if($eventsearched == $elements['Event_Name']){
				$db->exec("CREATE TABLE IF NOT EXISTS event (Event_Name TEXT PRIMARY KEY, Description TEXT, Password TEXT, Start_Day INTEGER, Duration INTEGER)");
				$event = $elements['Event_Name'];
				$description = $elements['Description'];
				$password = $elements['Password'];
				$start = $elements['Start_Day'];
				$duration = $elements['Duration'];
				$success = true;
				break;
			}
		}
		if($success == false)
		{
			ob_start();
			header("Location: failedsearch.php");
		}
	}

	if(array_key_exists("Name", $_REQUEST)){
		$Name = $_REQUEST["Name"];
		$db->exec("CREATE TABLE IF NOT EXISTS event (Event_Number INTEGER PRIMARY KEY, Event_Name TEXT, Password TEXT, Latitude NUMERIC, Longitude NUMERIC, Start_Day INTEGER, Phone_Number TEXT, Time INTEGER)");
		$Phone = $_REQUEST["Phone"];
		$House = $_REQUEST["House"];
		$Street = $_REQUEST["Street"];
		$City = $_REQUEST["City"];
		$State = $_REQUEST["State"];
		$data = latLong($House, $Street, $City, $State);
		$db->exec("INSERT INTO event VALUES ($dataarray[0]', '$dataarray[5]', '$dataarray[4]', '$dataarray[1]', '$dataarray[2]', '$dataarray[3]')");
		$url = ("https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=".urlencode($data['lat'].",".$data['lng'])."&rankby=distance&types=cafe|library&key=AIzaSyABnYXRMPALu86NBXs4armOjs0h_MWNUdI");
		$locations = json_decode(file_get_contents($url), true);
		// echo($locations);
		$name1 = $locations["results"][0]["name"];
		$name2 = $locations["results"][1]["name"];
		$name3 = $locations["results"][2]["name"];
		$location1 = $locations["results"][0]["vicinity"];
		$location2 = $locations["results"][1]["vicinity"];
		$location3 = $locations["results"][2]["vicinity"];
		$bestLocationsArray = array($name1 => $location1, $name2 => $location2, $name3 => $location3);
		$_SESSION["locations"] = $bestLocationsArray;
		
		// Latitude data[lat];
		// Longitude data[lng];
	}
	function latLong($House, $Street, $City, $State) {
		$url = ("https://maps.googleapis.com/maps/api/geocode/json?address=".urlencode($House." ".$Street." ".$City.", ".$State)."&key=AIzaSyABnYXRMPALu86NBXs4armOjs0h_MWNUdI");
		$allwebsitedata = file_get_contents($url);
		$json = json_decode($allwebsitedata, true);
		$location = $json['results'][0]['geometry']['location'];
		return $location;
	}
	?>