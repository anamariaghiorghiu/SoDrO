<?php

if(isset($_POST["submit"])){

	$uid = $_POST["uid"];
	$pwd = $_POST["pwd"];

	include "../classes/DatabaseHandler.php";
	include "../classes/Login.php";
	include "../classes/LoginController.php";
	$login = new LoginController($uid, $pwd);

	$login->loginUser();

	header("location: ../login.php?error=none");
	exit();
}
else{
	header("location: ../login.php");
	exit();
}