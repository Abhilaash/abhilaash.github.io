<!DOCTYPE HTML>
<html>
<head>
	<title>
		Find a Recipe
	</title>
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
Enter what you already have and we'll find a recipe for you!<br><br>

<form method = "post" id = "form" action = "findBestRecipe.php">
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
	<p id = "last"></p> 
	<button id = "button" type = "button" onClick = "add()">Add Ingredient</button><br>
	<br>
	<input type="submit" id="submit" value="Submit">
</form>

</body>
</html>
<?php

// $recipe1 = array(
// array(5,"teaspoon","sugar"),
// array(3,"tablespoon", "salt"));

// $recipe2 = array(
// array(3, "teaspoon", "sugar"),
// array(5, "tablespoon", "salt")
// 	);

$recipe1 = array(
	array(6, "oz", "pasta"),
	array(1, "cup", "tomato sauce")
	);
$recipe2 = array(
	array(8,"oz", "lettuce"),
	array(4, "oz", "tomato"),
	array(3, "oz", "cheese"),
	array(1, "cup", "dressing"));
$recipe3 = array(
	array(0.25, "lb", "ground beef"),
	array(2, "oz", "hamburger bun"),
	array(1, "oz", "lettuce"),
	array(1, "oz", "tomato"),
	array(2, "fl oz", "ketchup"));
$recipe4 = array(
	array(0.75, 'cup', milk),
	array(2, "tablespoons", "white vinegar"),
	array(1, "cup","flour"),
	array(2, "tablespoons", "white sugar"),
	array(1, "teaspoon", "baking powder"),
	array(0.5, "teaspoon", "baking soda"),
	array(0.5, "teaspoon", "salt"),
	array(1, "oz", "egg"),
	array(2, "tablespoons", "melted butter"));
$recipe5 = array(
	array(1.33, "cups", "flour"),
	array(0.5, "teaspoon", "salt"),
	array(2, "cups", "pumpkin"),
	array(12, "fl oz", "milk"),
	array(4, "oz", "eggs"),
	array(0.75, "cup", "sugar"),
	array(0.5, "teaspoon", "cinnamon"),
	array(0.5, "teaspoon", "ginger"),
	array(0.5, "teaspoon", "nutmeg"),
	array(0.5, "teaspoon", "salt"));
$recipe6 = array(
	array(3, "oz", "tortilla"),
	array(0.25, "lb", "steak"),
	array(5, "cup", "rice"),
	array(2, "cup", "tomato"),
	array(2, "cup", "lettuce"),
	array(2, "cup", "cream"),
	array(1, "cup", "bean"));
$recipe7 = array(
	array(0.25, "lb", "beef"),
	array(1, "oz", "taco shells"),
	array(4, "fl oz", "hot sauce"),
	array(1, "cup", "tomato"),
	array(1, "cup", "lettuce"));

$r1 = round(getNumber($recipe1), 2);
$r2 = round(getNumber($recipe2), 2);
$r3 = round(getNumber($recipe3), 2);
$r4 = round(getNumber($recipe4), 2);
$r5 = round(getNumber($recipe5), 2);
$r6 = round(getNumber($recipe6), 2);
$r7 = round(getNumber($recipe7), 2);
// echo "R1 ".$r1."<br>";
// echo "R2 ".$r2."<br>";
$rWin = compare($r1, $r2, $r3, $r4, $r5, $r6, $r7);
echo "Choose: ".$rWin;

// $query = "http://api.walmartlabs.com/v1/search?query=".$_POST["ing"][0]."&format=json&apiKey=kqf28jqgt45hsks9htpudsuk";
// $curlSession = curl_init($query);
// curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);
// $jsonQuery = curl_exec($curlSession);
// $jsonData = json_decode($jsonQuery);
// print_r($jsonData);
// $price = $jsonData -> items;
// print_r($price[0]);;
// echo "<br>Price: ".$price."<br>";

function compare($r1, $r2, $r3, $r4, $r5, $r6, $r7){
	$array = array();
	array_push($array, $r1, $r2, $r3, $r4, $r5, $r6, $r7);
	//$keys = max($array);
	$maxKey = array_keys($array, max($array));
	return $maxKey[0]+1;

}

function getNumber($recipe1){
$recipeNumber = 0.0;
foreach($recipe1 as $cell){
	$i = 0;
	while(!empty($_POST["qty"][$i])){
		if($cell[1]==$_POST["sel"][$i] and $cell[2]==$_POST["ing"][$i])
		$recipeNumber+=($_POST["qty"][$i]/$cell[0]);
		//echo "<br>Recipe Num".$recipeNumber."<br>";
		$i+=1;
		//foreach( $cell as $temp)
			//echo $temp." ";
	}
}
//echo "<br>Recipe Number:".$recipeNumber."<br>";
return $recipeNumber;
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

		var array = ["Teaspoon","Tablespoon", "Cup", "Fluid Oz", "Pint", "Quart", "Gallon", "Milliliter", "Liter", "Gram", "Kilogram"];
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