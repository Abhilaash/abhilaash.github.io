<!DOCTYPE html>
<html>
<head>
	<title>Upload Recipes</title>
	        <link rel="shortcut icon" href="image.ico">
        <link href='https://fonts.googleapis.com/css?family=Indie+Flower' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="upload.css">
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
<p id="uploadtherecipes">Upload Recipes</p>
<form method = "post" id = "form" action = "upload.php">Name of Your Recipe<br><input type="text" name ="name_of_recipe[]"><br>
  Quantity&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Units&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Ingredients<br>
  <input type="text" name="qty[]">

 <select name = "sel[]" id='mySelect'>
<option value='teaspoon'>Teaspoon</option>
<option value='tablespoon'>Tablespoon</option>
<option value='cup'>Cup</option>
<option value='fluid oz'>Fluid Oz</option>
<option value='pint'>Pint</option>
<option value='quart'>Quart</option>
<option value='gallon'>Gallon</option>
<option value='ml'>Milliliter</option>
<option value='liter'>Liter</option>
<option value='gram'>Gram</option>
<option value='kilogram'>Kilogram</option>
</select>

  <input type="text" name="ing[]">
  <p id = "last">
  </p> 
	<textarea name = "instr" rows = "5" onfocus="this.value=''" cols = "50">Enter instructions for your recipe.</textarea><br>
	<br><button id = "button" type = "button" onClick = "add()">Add Ingredient</button>
	<br><br>
	<input type="submit" id="submit" value="Submit">
</form>

</body>
</html>
<?php
class Database extends SQLite3 {
		function __construct() {
			$this->open('recipedata.db', SQLITE3_OPEN_READWRITE);
		}
	}
		if(array_key_exists("qty", $_REQUEST)){
			$quantity = $_REQUEST["qty"];
			$units = $_REQUEST["sel"];
			$ingredients = $_REQUEST["ing"];
			$data = uploadData($ingredients, $quantity, $units);
		}
	function uploadData($ingredients, $quantity, $units) {
		$db = new Database();
		$db->exec("CREATE TABLE IF NOT EXISTS recipes (ingredients TEXT PRIMARY KEY, quantity REAL, units TEXT)");
		for($x = 0; $x < count($ingredients); $x++){
			$stmt = $db->prepare("INSERT INTO recipes VALUES (:ing, :quan, :units)");
			$ing = $ingredients[$x];
			$quan = $quantity[$x];
			$unit = $units[$x];
			echo $ing." ".$quan." ".$unit."<br>";
			$stmt -> bindValue(':ing', $ing);
			$stmt -> bindValue(':quan', $quan);
			$stmt -> bindValue(':units', $unit);
			$stmt -> execute();
		}
	}
?>


<script type='text/javascript'>
	var ingredient;
	var label;
	var bk;
	var qty;
	var select;
	var arrayData = []
	counter = 1;
	function add(){
		ingredient = document.createElement("input");
		label = document.createElement("label");
		bk = document.createElement("br");
		qty = document.createElement("input");
		select = document.createElement("select");
		ingredient.type = "text";
		ingredient.name = "ing[]";
		ingredient.innerHTML = "ingre";
		qty.type = "text";
		qty.name = "qty[]";
		qty.innerHTML = "qty";
		select.id = "mySelect";

		var array = ["teaspoon","tablespoon", "cup", "fluid oz", "pint", "quart", "gallon", "ml", "liter", "gram", "kilogram"];
		for(i = 0; i < array.length; i++){
		var option = document.createElement("option");
		option.text = array[i];
		select.appendChild(option);
		}
		document.getElementById("last").appendChild(qty);
		document.getElementById("last").appendChild(select);
		document.getElementById("last").appendChild(ingredient);
		document.getElementById("last").appendChild(bk);
	}
</script>

