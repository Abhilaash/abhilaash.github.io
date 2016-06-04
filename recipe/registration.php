<!DOCTYPE html>
<html>
    <head>
	<title> Registration </title>
	<link rel="shortcut icon" href="image.ico">
        <link href='https://fonts.googleapis.com/css?family=Indie+Flower' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="51.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<script src="registration.js"></script>
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
	<body>
	<div id="navbar"></div>
	<h1> Register Here! </h1>
<form method="POST" action="registration.php">
	First Name<br>
	<input type="text" name="firstname">
	<br>
	Last Name<br>
	<input type="text" name="lastname">
	<br>
	Email Address<br>
	<input type="text" name="email">
	<br>
	Username<br>
	<input type="text" name="username">
	<br>
	Password<br>
	<input type="password" name="password">
	<br>
	Re-enter Password<br>
	<input type="password" name="confirmpass">
	<br>
	<br>
	<button type="submit" id = "submit" accesskey = "s" > Submit </button>&nbsp;&nbsp;&nbsp;<button type="button" id = "login" accesskey = "l" > Log In </button>
</form>

	</body>
	<?php
		class Database extends SQLite3 {
			function __construct() {
				$this->open('accountdata.db', SQLITE3_OPEN_READWRITE);
			}
		}
		if(array_key_exists("firstname", $_REQUEST)){
			$firstname = $_REQUEST["firstname"];
			$lastname = $_REQUEST["lastname"];
			$username = $_REQUEST["username"];
			$password = $_REQUEST["password"];
			$email = $_REQUEST["email"];
			if($password == $_REQUEST["confirmpass"]){
				$data = uploadData($firstname." ".$lastname, $username, md5($password), $email);
			}
			else{
				echo("Passwords do not match");
			}
		}

		function uploadData($name, $username, $password, $email) {
			$db = new Database();
			$db->exec("CREATE TABLE IF NOT EXISTS recipes (username TEXT PRIMARY KEY, password TEXT, email TEXT, name TEXT)");
			$stmt = $db->prepare("INSERT INTO recipes VALUES (:us, :ps, :em, :n)");
			$stmt -> bindValue(':us', $username);
			$stmt -> bindValue(':ps', $password);
			$stmt -> bindValue(':em', $email);
			$stmt -> bindValue(':n', $name);
			$stmt -> execute();

		}
	?>
</html>