<?php

if(isset($_POST["submit"])){

	$name = $_POST["name"];
	$email = $_POST["email"];
	$uid = $_POST["uid"];
	$pwd = $_POST["pwd"];
	$pwdRepeat = $_POST["pwdRepeat"];

	include "../classes/DatabaseHandler.php";
	include "../classes/Register.php";
	include "../classes/RegisterController.php";
	$register = new RegisterController($name, $email, $uid, $pwd, $pwdRepeat);

	$register->registerUser();

	header("location: ../register.php?error=none");
	exit();
}
else{
	header("location: ../register.php");
	exit();
}