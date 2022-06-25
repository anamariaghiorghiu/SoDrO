<?php

session_start();
if(isset($_POST["listId"]))
{
	include "../classes/DatabaseHandler.php";
	include "../classes/Lists.php";
	include "../classes/ListsView.php";
	include "../classes/ListsController.php";

	$listsView = new ListsView();
	$lists = new ListsController();
	if(empty($_POST["newListName"])){
		$lists->updateListNameById($_POST["listId"],"Unnamed List");
	}
	else{
		$lists->updateListNameById($_POST["listId"],$_POST["newListName"]);
	}
}
else{
	if(isset($_SESSION["userid"])){
		header("location: ../login.php?error=notLoggedIn");
		exit();
	}
	else{
		header("location: ../viewList.php?id=".$_POST["listId"]."?error=restrictedAcces");
		exit();
	}
}