<?php

session_start();

if(isset($_SESSION["userid"])){
	if(isset($_POST["update-list"])){
		include "../classes/DatabaseHandler.php";
		include "../classes/Lists.php";
		include "../classes/ListsView.php";
		include "../classes/ListsController.php";

		$listsView = new ListsView();
		if(empty($listsView->getListById($_POST["send-id"]))){
		}
		else{
			$lists = new ListsController($_POST["update-list-value"]);
			$lists->updateListNameById($_POST["send-id"],$_POST["update-list-value"]);
		}
		header("location: ../viewList.php?id=".$_POST["send-id"]);
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