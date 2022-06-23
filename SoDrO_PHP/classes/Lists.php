<?php

class Lists extends DatabaseHandler {

	protected function insertList($name, $userId){
		$sql="INSERT INTO drinksList (name, createdAt, userId) values (?, ?, ?);";
		$stmt = $this->connect()->prepare($sql);
		$stmt->bindValue(1, $name, PDO::PARAM_STR);
		$stmt->bindValue(2, date('Y-m-d H:i:s'));
		$stmt->bindValue(3, $userId, PDO::PARAM_INT);
		if(!$stmt->execute()){
			$stmt = null;
			header("location: ../list.php?error=stmtFailed");
			exit();
		}
		$stmt = null;
	}

	protected function getAll($userId){
		$sql="SELECT * FROM drinksList WHERE userId = ?";
		$stmt = $this->connect()->prepare($sql);
		$stmt->bindValue(1, $userId, PDO::PARAM_INT);
		$stmt->execute();
		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $results;
	}

}