<?php 

class Login extends DatabaseHandler {

	protected function getUser($uid, $pwd){
		$stmt = $this->connect()->prepare('SELECT usersPwd FROM users WHERE usersUid = ? or usersEmail = ?;');

		$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

		if(!$stmt->execute(array($uid, $pwd))){
			$stmt = null;
			header("location: ../register.php?error=stmtFailed");
			exit();
		}

		if($stmt->rowCount() == 0){
			$stmt = null;
			header("location: ../login.php?error=wrongUsername");
			exit();
		}

		$pwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$checkPwd = password_verify($pwd, $pwdHashed[0]["usersPwd"]);

		if($checkPwd == false){
			$stmt = null;
			header("location: ../login.php?error=wrongPassword");
			exit();
		}
		else if($checkPwd == true){
			$stmt = $this->connect()->prepare('SELECT * FROM users WHERE usersUid = ? or usersEmail = ? AND usersPwd = ?;');

			if(!$stmt->execute(array($uid, $uid, $pwd))){
				$stmt = null;
				header("location: ../register.php?error=stmtFailed");
				exit();
			}
			if($stmt->rowCount() == 0){
				$stmt = null;
				header("location: ../login.php?error=wrongUsername");
				exit();
			}

			$user = $stmt->fetchAll(PDO::FETCH_ASSOC);

			session_start();
			$_SESSION["userid"] = $user[0]["usersId"];
			$_SESSION["userid"] = $user[0]["usersUid"];
			$stmt = null;
		}

		$stmt = null;
	}

}