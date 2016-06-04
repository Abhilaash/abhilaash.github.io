	<!doctype html>
	<html>
	<head>
		<h1 align="center">Time<br></h1>
			<title>
				Time
			</title>
	</head>
	<body>
	</body>
	<?php
	$myfile = fopen("time.txt", "a+");
	$currentopening = date("H:i:s");
	echo("<br> You entered the page at: ".$currentopening."<br>");

	// $filecontents = file_get_contents("time.txt");
//There is nothing in the file
	if(feof($myfile)){
		fwrite($myfile, $currentopening);
		fwrite($myfile, "1");
		echo("The page was visited 1 time."."<br>");
	}
//The file has data.
	else {
	$previousvisit = fgets($myfile);
	echo("The page was previously entered at: $previousvisit<br>");
	$hits = (int) fgets($myfile);
	$hits++;
	echo("This site has been visited ".$hits." times<br>");
	$myfile = fopen("time.txt", "w");
	fwrite($myfile, $currentopening);
	fwrite($myfile, "\r\n".$hits);
}
	?>
	</html>