<!DOCTYPE html>
<html>
    <head>
        <title> Recipe Finder </title>
        <link rel="shortcut icon" href="image.ico">
        <link href='https://fonts.googleapis.com/css?family=Indie+Flower' rel='stylesheet' type='text/css'>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<script src="Buttons3.js"></script>
		<link rel="stylesheet" type="text/css" href="login.css">
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
	</head>
	<div id="navbar"></div>
	<h1>Please Log In To Continue!
	<body>
	<form method="POST" action="login.php"><br>
	Username:<br>
	<input type="text" name="username" id="username"><br><br>
	Password:<br>
	<input type="password" name="password" id="username"><br>
	&nbsp;&nbsp;<button type="submit" id = "login" accesskey = "l" >Log In</button>&nbsp;&nbsp;
	</form>
	</body>
	<?php
		class Database extends SQLite3 {
			function __construct() {
				$this->open('accountdata.db', SQLITE3_OPEN_READWRITE);
			}
		}
		if(array_key_exists("username", $_REQUEST)){
			$username = $_REQUEST["username"];
			$password = md5($_REQUEST["password"]);
			$data = validate($username, $password);
		}
	function validate($username, $password){
		$db = new Database();
		$db->exec("CREATE TABLE IF NOT EXISTS recipes (username TEXT PRIMARY KEY, password TEXT, email TEXT, name TEXT)");
		$ret = $db->query("SELECT username, password FROM recipes");
		while($elements = $ret->fetchArray(SQLITE3_ASSOC)){
			if($username == $elements['username']){
				if($password == $elements['password']){
					header("Location:homepage.html");
				}
			}
		}
		echo("Incorrect username or password");
	}

	?>
</html>
	