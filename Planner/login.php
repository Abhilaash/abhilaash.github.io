<!DOCTYPE html>
<html>
    <head>
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
         <link href="http://s3.amazonaws.com/codecademy-content/courses/ltp/css/shift.css" rel="stylesheet">
    <link rel="stylesheet" href="http://s3.amazonaws.com/codecademy-content/courses/ltp/css/bootstrap.css">
    <link rel="stylesheet" href="login.css">
    </head>
<div id="navbar"></div>

<div class="container"> 
<p></p>
<p></p>
</div>
<div class="container">
    <div class="row">

        
        <div class="col-sm-6 col-md-4 col-md-offset-4">

            <!-- <h1 class="text-center login-title"><font color="white">Login</font></h1> -->
            <div class="account-wall">

                <form class="form-signin" action="login.php">
                <center><h1> <font color="#19A3FF">Login </font></h1><Center>
                <center><img src="planitlogosidewaysblack.png" height = "70%" width = "70%"></center>
                <input type="text" class="form-control" placeholder="Username" name = "username" id = "username" required autofocus>
                <input type="password" class="form-control" placeholder="Password" name = "password" id = "password" required>
                <button class="btn btn-lg btn-primary btn-block" type="submit">
                    Sign in</button>
                <a href="registration.php" class="text-center new-account">Create an account </a>
                </form> 
            </div>
            
        </div>
    </div>
</div>
	<?php
	$username = "ba9022d6acbebc";
	$password = "cbb3d49f";
	$hostname = "br-cdbr-azure-south-a.cloudapp.net"; 
	
		if(array_key_exists("username", $_REQUEST)){
			$usernamePerson = $_REQUEST["username"];
			$passwordPerson = $_REQUEST["password"];
			$data = validate($usernamePerson, $passwordPerson);
		}
	// 	function validate($username, $password){
	// 	$db = new Database();
	// 	$db->exec("CREATE TABLE IF NOT EXISTS recipes (username TEXT PRIMARY KEY, password TEXT, email TEXT, name TEXT)");
	// 	$ret = $db->query("SELECT username, password FROM recipes");
	// 	while($elements = $ret->fetchArray(SQLITE3_ASSOC)){
	// 		if($username == $elements['username']){
	// 			if($password == $elements['password']){
	// 				header("Location:homepage.html");
	// 			}
	// 		}
	// 	}
	// 	echo("Incorrect username or password");
	// }
		function validate($usernamePerson, $passwordPerson){
			if($usernamePerson == "colin"){
				if($passwordPerson == "asdfjkl;"){
					header("Location: userprofile.html");
					return True;
				}
			}
			return False;
		}
	// function validate($usernamePerson, $passwordPerson){
	// 	if($usernamePerson == 'abhilaash'){
	// 		if($passwordPerson == 'asdfjkl;'){
	// 			header("Location: userprofile.html")
	// 		}
	// 	}
	// }
	?>
</html>
