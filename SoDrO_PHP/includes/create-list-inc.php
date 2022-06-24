<?php

session_start();

if(isset($_SESSION["userid"])){
	if(isset($_POST["add-button"])){
		include "../classes/DatabaseHandler.php";
		include "../classes/Lists.php";
		include "../classes/ListsController.php";

		$lists = new ListsController();
		$lists->createList($_POST["list-name"], $_SESSION["userid"]);
		header("location: ../lists.php");
		exit();
	}
	else{
		header("location: ../lists.php");
		exit();
	}
}
else{
	header("location: ../lists.php?error=notLoggedIn");
	exit();
}