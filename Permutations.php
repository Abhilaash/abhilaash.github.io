	<!doctype html>
	<html>
	<head>
		<h1 align="center">Permutations<br></h1>
			<title>
				Permutations
			</title>
	</head>
	<body>
	<form method="get" action="Permutations.php">
	<input name="textfield" type="text">
	<br>
	<button id="permute" name="permute" accesskey="p" type="submit"><u>P</u>ermutations</button>
	</form>
	</body>
	<?php
	if(array_key_exists("textfield", $_REQUEST)){
		$originalword = $_REQUEST["textfield"];
		$alreadycreated = array();
		permute($originalword, 0, strlen("$originalword"), $alreadycreated);
		print("The word ".$originalword." has ".sizeof($alreadycreated)." permutations");
	}
	function permute($originalword,$current,$length,&$alreadycreated) {
		if ($current == $length){
			if(!in_array($originalword, $alreadycreated)){
				print "$originalword<br>\n";
				array_push($alreadycreated, $originalword);
			}
		}
   		else {
        	for ($cur = $current; $cur < $length; $cur++) {
          		swap($originalword,$current,$cur);
          		permute($originalword, $current+1, $length,$alreadycreated);
          		swap($originalword,$current,$cur);
       		}
   		}
	}
function swap(&$str,$i,$j) {
    $temp = $str[$i];
    $str[$i] = $str[$j];
    $str[$j] = $temp;
}   
	?>
	</html>