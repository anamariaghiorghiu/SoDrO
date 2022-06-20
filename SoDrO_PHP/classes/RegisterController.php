<?php

class RegisterController extends Register {

	private $name;
	private $email;
	private $uid;
	private $pwd;
	private $pwdRepeat;

	public function __construct($name, $email, $uid, $pwd, $pwdRepeat){
		$this->name = $name;
		$this->email = $email;
		$this->uid = $uid;
		$this->pwd = $pwd;
		$this->pwdRepeat = $pwdRepeat;
	}

	public function registerUser(){
		if($this->emptyInputRegister() !== false){
			header("location: ../register.php?error=emptyInput");
			exit();
		}
		if($this->invalidUid() !== false){
			header("location: ../register.php?error=invalidUid");
			exit();
		}
		if($this->invalidEmail() !== false){
			header("location: ../register.php?error=invalidEmail");
			exit();
		}
		if($this->pwdMatch() !== false){
			header("location: ../register.php?error=pwdMatchFalse");
			exit();
		}
		if($this->uidOrEmailExists() !== false){
			header("location: ../register.php?error=uidOrEmailExists");
			exit();
		}

		$this->setUser($this->name, $this->email, $this->uid, $this->pwd);

	}

	private function emptyInputRegister(){
		$result;
		if(empty($this->name) || empty($this->email) || empty($this->uid) || empty($this->pwd) || empty($this->pwdRepeat)){
			$result = true;
		}
		else{
			$result = false;
		}
		return $result;
	}

	private function invalidUid(){
		$result;
		if(!preg_match("/^[a-zA-Z0-9]*$/", $this->uid)){
			$result = true;
		}
		else{
			$result = false;
		}
		return $result;
	}

	private function invalidEmail(){
		$result;
		if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
			$result = true;
		}
		else{
			$result = false;
		}
		return $result;
	}

	private function pwdMatch(){
		$result;
		if($this->pwd !== $this->pwdRepeat){
			$result = true;
		}
		else{
			$result = false;
		}
		return $result;
	}

	private function uidOrEmailExists(){
		$result;
		if($this->checkUserExists($this->uid, $this->email)){
			$result = true;
		}
		else{
			$result = false;
		}
		return $result;
	}

}