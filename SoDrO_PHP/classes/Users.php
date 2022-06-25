<?php 

class Users extends DatabaseHandler {

	protected function getName($id){
		$sql = "SELECT usersName as name from users WHERE usersId = ?;";
		$stmt = $this->connect()->prepare($sql);
		$stmt->bindValue(1, $id, PDO::PARAM_INT);
		$stmt->execute();

		$results = $stmt->fetch(PDO::FETCH_ASSOC);
		return $results;
	}

	protected function getUid($id){
		$sql = "SELECT usersUid as uid from users WHERE usersId = ?;";
		$stmt = $this->connect()->prepare($sql);
		$stmt->bindValue(1, $id, PDO::PARAM_INT);
		$stmt->execute();

		$results = $stmt->fetch(PDO::FETCH_ASSOC);
		return $results;
	}

	protected function getEmail($id){
		$sql = "SELECT usersEmail as email from users WHERE usersId = ?;";
		$stmt = $this->connect()->prepare($sql);
		$stmt->bindValue(1, $id, PDO::PARAM_INT);
		$stmt->execute();

		$results = $stmt->fetch(PDO::FETCH_ASSOC);
		return $results;
	}

	protected function getBio($id){
		$sql = "SELECT usersBio as bio from users WHERE usersId = ?;";
		$stmt = $this->connect()->prepare($sql);
		$stmt->bindValue(1, $id, PDO::PARAM_INT);
		$stmt->execute();

		$results = $stmt->fetch(PDO::FETCH_ASSOC);
		return $results;
	}

}