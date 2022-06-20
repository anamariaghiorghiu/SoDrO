<?php

class LoginController extends Login {

	private $uid;
	private $pwd;

	public function __construct($uid, $pwd){
		$this->uid = $uid;
		$this->pwd = $pwd;
	}

	public function loginUser(){
		if($this->emptyInputLogin() !== false){
			header("location: ../login.php?error=emptyInput");
			exit();
		}

		$this->getUser($this->uid, $this->pwd);

	}

	private function emptyInputLogin(){
		$result;
		if(empty($this->uid) || empty($this->pwd)){
			$result = true;
		}
		else{
			$result = false;
		}
		return $result;
	}


}