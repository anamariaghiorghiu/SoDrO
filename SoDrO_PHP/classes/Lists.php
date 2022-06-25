<?php

class Lists extends DatabaseHandler {

	protected function insertList($name, $userId){
		$sql="INSERT INTO drinksList (name, counter, createdAt, userId) values (?, 0, ?, ?);";
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

	protected function getById($id){
		$sql="SELECT * FROM drinksList WHERE id = ?";
		$stmt = $this->connect()->prepare($sql);
		$stmt->bindValue(1, $id, PDO::PARAM_INT);
		$stmt->execute();
		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $results;
	}

	protected function deleteById($id){

		$sql="DELETE FROM drinksListItems WHERE drinksListId = ?";
		$stmt = $this->connect()->prepare($sql);
		$stmt->bindValue(1, $id, PDO::PARAM_INT);
		$stmt->execute();

		$sql="DELETE FROM drinksList WHERE id = ?;";
		$stmt = $this->connect()->prepare($sql);
		$stmt->bindValue(1, $id, PDO::PARAM_INT);
		$stmt->execute();
	}

	protected function updateNameById($id, $name){
		$sql="UPDATE drinksList SET name = ? WHERE id = ?;";
		$stmt = $this->connect()->prepare($sql);
		$stmt->bindValue(1, $name, PDO::PARAM_STR);
		$stmt->bindValue(2, $id, PDO::PARAM_INT);
		$stmt->execute();
	}

	protected function getProductsById($id){
		$sql="SELECT DISTINCT
		products.id as productId,
		products.name as productName,
		products.price as price,
		products.quantity as quantity,
		products.imageSrc as imageSrc,
		drinksList.id as listId,
		drinksList.name as listName,
		drinksList.counter as counter,
		drinksList.createdAt as createdAt
		FROM products JOIN drinkslistitems on products.id = drinkslistitems.productsid
		JOIN drinkslist on drinkslistitems.drinksListId = drinkslist.id
		WHERE drinksList.id=?";
		$stmt = $this->connect()->prepare($sql);
		$stmt->bindValue(1, $id, PDO::PARAM_INT);
		$stmt->execute();

		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $results;
	}

	protected function getCountByIds($listId, $productId){
		$sql="SELECT COUNT(*) AS count FROM drinksListItems WHERE drinksListId = ? AND productsId = ?";
		$stmt = $this->connect()->prepare($sql);
		$stmt->bindValue(1, $listId, PDO::PARAM_INT);
		$stmt->bindValue(2, $productId, PDO::PARAM_INT);
		$stmt->execute();
		$results = $stmt->fetch(PDO::FETCH_ASSOC);
		return $results;
	}

	protected function getItemsId($listId, $productId){
		$sql="SELECT id FROM drinksListItems WHERE drinksListId = ? AND productsId = ? LIMIT 1";
		$stmt = $this->connect()->prepare($sql);
		$stmt->bindValue(1, $listId, PDO::PARAM_INT);
		$stmt->bindValue(2, $productId, PDO::PARAM_INT);
		$stmt->execute();
		$results = $stmt->fetch(PDO::FETCH_ASSOC);
		return $results;
	}

	protected function addItem($listId ,$productId){
		$sql="INSERT INTO drinksListItems (drinksListId, productsId) values (?, ?);";
		$stmt = $this->connect()->prepare($sql);
		$stmt->bindValue(1, $listId, PDO::PARAM_INT);
		$stmt->bindValue(2, $productId, PDO::PARAM_INT);
		if(!$stmt->execute()){
			$stmt = null;
			echo "Something went wrong, try again!";
		}
		$stmt = null;
	}

	protected function deleteItemById($id){
		$sql="DELETE FROM drinksListItems WHERE id = ?";
		$stmt = $this->connect()->prepare($sql);
		$stmt->bindValue(1, $id, PDO::PARAM_INT);
		$stmt->execute();
	}

}