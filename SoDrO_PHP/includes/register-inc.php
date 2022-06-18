<?php

if(isset($_POST["submit"])){
	
	$name = $_POST["name"];
	$email = $_POST["email"];
	$username = $_POST["uid"];
	$pwd = $_POST["pwd"];
	$pwdRepeat = $_POST["pwdRepeat"];

	require_once 'dbh-inc.php';
	require_once 'functions-inc.php';

	if(emptyInputRegister($name, $email, $username, $pwd, $pwdRepeat) !== false){
		header("location: ../register.php?error=emptyInput");
		exit();
	}
	if(invalidUid($username) !== false){
		header("location: ../register.php?error=invalidUid");
		exit();
	}
	if(invalidEmail($email) !== false){
		header("location: ../register.php?error=invalidEmail");
		exit();
	}
	if(pwdMatch($pwd, $pwdRepeat) !== false){
		header("location: ../register.php?error=pwdMatchFalse");
		exit();
	}
	if(uidOrEmailExists($conn, $username, $email) !== false){
		header("location: ../register.php?error=uidOrEmailExists");
		exit();
	}

	createUser($conn, $name, $email, $username, $pwd);

}
else{
	header("location: ../register.php");
	exit();
}