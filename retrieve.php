<!DOCTYPE html>
<html>
	<?php
		class Database extends SQLite3 {
			function __construct() {
				$this->open('fruits.db', SQLITE3_OPEN_READWRITE);
			}
		}
		if(array_key_exists("fruitname", $_REQUEST)){
			$fruit = $_REQUEST["fruitname"];
			$data = retrievefromdatabase($fruit);
		}
	function retrievefromdatabase($fruit){
		$db = new Database();
		$db->exec("CREATE TABLE IF NOT EXISTS recipes (fruit TEXT PRIMARY KEY, avgprice TEXT, dates TEXT, places TEXT)");
		$ret = $db->query("SELECT fruit FROM recipes");
		while($elements = $ret->fetchArray(SQLITE3_ASSOC)){
			if($fruit == $elements['fruit']){
				print_r($elements);
			}
		}
		echo("Incorrect username or password");
	}

	?>
</html>
	