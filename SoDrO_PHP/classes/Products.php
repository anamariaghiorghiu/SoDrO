<?php

class Products extends DatabaseHandler {

	protected function getAll(){
		$sql = "SELECT * from products;";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute();

		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $results;
	}

}