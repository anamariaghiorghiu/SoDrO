<?php 

session_start();

if(isset($_SESSION["userid"])){
	if(isset($_POST["remove"])){
		include "../classes/DatabaseHandler.php";
		include "../classes/Lists.php";
		include "../classes/ListsView.php";
		include "../classes/ListsController.php";

		$listsView = new ListsView();
		if(empty($listsView->getListById($_GET["id"]))){
		}
		else{
			$listsController = new ListsController(null);
			$listsController->deleteListById($_GET["id"]);
			echo "succes";
		}
		header("location: ../lists.php");
		exit();
	}
	else{
		header("location: ../lists.php?error=noButtonPressed");
		exit();
	}
}
else{
	header("location: ../lists.php?error=notLoggedIn");
	exit();
}