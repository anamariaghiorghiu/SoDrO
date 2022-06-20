<?php 

class Register extends DatabaseHandler {

	protected function setUser($name, $email, $uid, $pwd){
		$stmt = $this->connect()->prepare('INSERT INTO users (usersName, usersEmail, usersUid, usersPwd) values (?, ?, ?, ?);');

		$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

		if(!$stmt->execute(array($name, $email, $uid, $hashedPwd))){
			$stmt = null;
			header("location: ../register.php?error=stmtFailed");
			exit();
		}

		$stmt = null;
	}

	protected function checkUserExists($uid, $email){
		$stmt = $this->connect()->prepare('SELECT usersUid FROM users WHERE usersUid = ? OR usersEmail = ?;');

		if(!$stmt->execute(array($uid, $email))){
			$stmt = null;
			header("location: ../register.php?error=stmtFailed");
			exit();
		}

		$result;
		if($stmt->rowCount() > 0){
			$result = true;
		}
		else{
			$result = false;
		}

		return $result;
	}

}