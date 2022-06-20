<?php

class DatabaseHandler {

	protected function connect(){
		try{
			$dbUsername = "root";
			$dbPassword = "";
			$dbh = new PDO('mysql:host=localhost;dbname=sodro', $dbUsername, $dbPassword);
			return $dbh;
		}catch(PDOException $e){
			print "Error!: " . $e->getMessage() . "<br/>";
			die();
		}
	}

}