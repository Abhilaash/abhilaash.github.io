<!DOCTYPE html>
<html lang="en">
<head>
  <title>Need 2 Meet</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <script> 
	    $(function(){
	      $("#navbar").load("https://www.tjhsst.edu/~2016avelamat/include/navbar.html"); 
    	});
    </script> 

<body>
<div id="navbar"></div>
	
	<br>
	<div class = "container">
	<div class = "jumbotron">
		<h1 align="center">EZ Meet</h1> 
	</div>
	<br>
	<br>
		<div class = "row">
			<div class = "col-sm-3"></div>
			<div class = "col-sm-6">
			    <div class="input-group">
				<form method="post" action="need2meet.php">
			      	<input type="text" class="form-control" placeholder="Search Event" name = "searchbar">
			      </form>
			      	<span class="input-group-btn">
			        	<button class="btn btn-default" type="submit">Search</button>
			      	</span>
			    </div><!-- /input-group -->
		  	</div><!-- /.col-lg-6 -->
		 	<div class = "col-sm-3"></div>
		</div>
		<br>
		<br>
		<center><h2>OR</h2></center>
		<br>
		<br>
		<form method="post" action="index.php">
		<div class = "row">
			<div class = "col-sm-3"></div>
			<div class = "col-sm-6">
			    <input type="text" class="form-control" placeholder="Event Name" name = "eventname">
		  	</div><!-- /.col-lg-6 -->
		  	<div class = "col-sm-3"></div>
		 </div>
		 <div class = "row">
		  	<div class = "col-sm-3"></div>
		  	<div class = "col-sm-6">
		  		<input type="text" class="form-control" placeholder="Description" name = "description">
		  	</div>
		  	<div class = "col-sm-3"></div>
		 </div>
		 <div class = "row">
		  	<div class = "col-sm-3"></div>
		  	<div class = "col-sm-6">
		  		<input type="password" class="form-control" placeholder="Password" name = "password">
		  	</div>
		  	<div class = "col-sm-3"></div>
		</div>
	    <div class = "row">
		  	<div class = "col-sm-3"></div>
		  	<div class = "col-sm-6">
		  		<input type="text" class="form-control" placeholder="Start of the week" name = "startday">
		      </div>
		  	<div class = "col-sm-3"></div>
		</div>
		<div class = "row">
		  	<div class = "col-sm-3"></div>
		  	<div class = "col-sm-6">
		  		<input type="text" class="form-control" placeholder="Duration" name = "duration">
		      </div>
		  	<div class = "col-sm-3"></div>
		</div>
		<div class = "row">
		  	<div class = "col-sm-3"></div>
		  	<div class = "col-sm-6">
				<center><button class="btn btn-default" type="submit">Create</button></center>
			</div>
		  	<div class = "col-sm-3"></div>
		</div>
	</form>
	</body>
	<?php
	class Database extends SQLite3 {
		function __construct() {
			$this->open('eventdata.db', SQLITE3_OPEN_READWRITE);
		}
	}
	if(array_key_exists("eventname", $_REQUEST)){
		$db = new Database();
		$db->exec("CREATE TABLE IF NOT EXISTS event (Event_Name TEXT PRIMARY KEY, Description TEXT, Password TEXT, Start_Day INTEGER, Duration INTEGER)");
		$event = $_REQUEST["eventname"];
		$description = $_REQUEST["description"];
		$password = $_REQUEST["password"];
		$startday = $_REQUEST["startday"];
		$duration = $_REQUEST["duration"];
		$stmt = $db->prepare("INSERT INTO event VALUES (:ev, :de, :pw, :sd, :du)");
		$stmt -> bindValue(':ev', $event);
		$stmt -> bindValue(':de', $description);
		$stmt -> bindValue(':pw', $password);
		$stmt -> bindValue(':sd', $startday);
		$stmt -> bindValue(':du', $duration);
		$stmt -> execute();	
	}
	?>
</html>