<!DOCTYPE html>
<html lang="en">
	<head>
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
		<div class  = "container">
			<div class="row">
				<center><h1>EZ Meet</h1></center>
			</div>			
			<div class = "row">
				<div class = "col-sm-6">
						<center><h1>Suggested Time</h1></center>
					<div class = "row">
						<h1>8:00 AM to 11:00 AM on 2 / 11 / 2016</h1> 
					</div>
					<br>
						<div class = "row">
						<h1>12:00 PM to 3:00 PM on 2 / 14 / 2016</h1>
			
				</div>
				<div class = "col-sm-6">
		<?php
		session_start();
		$locations = $_SESSION["locations"];
		echo "<center><h1>Suggested Location</h1></center>";
		foreach($locations as $key => $value) 
		{
			echo "<h1>".$key."   ".$value."</h1><br>";
		}
	?>	
    	</div>
			</div>
			<div class = "row">	
	    			<center><button id = "Location 2" class="btn btn-default btn-lg" type="button" >Finalize</button></center>

			</div>

	</body>
	
</html>