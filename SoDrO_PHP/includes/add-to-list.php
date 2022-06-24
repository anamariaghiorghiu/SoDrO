<?php

session_start();

if(isset($_SESSION["userid"])){
	if(isset($_POST["listId"])){
		include "../classes/DatabaseHandler.php";
		include "../classes/Lists.php";
		include "../classes/ListsView.php";
		include "../classes/ListsController.php";
		
		$listsView = new ListsView();
		if($listsView->getListById($_POST["listId"]) == null){
			echo "Please create a list first!";
		}
		else{
			$listsController = new ListsController();
			$listsController->addListItem($_POST["listId"], $_POST["productId"]);
			echo "Product added succesfully!";
		}
	}
	else{
		header("location: ../products.php?error=restrictedAcces");
		exit();
	}
}
else{
	echo "Please log in first!";
}