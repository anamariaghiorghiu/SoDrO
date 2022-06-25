<?php

class Products extends DatabaseHandler {

	protected function getAll(){
		$sql = "SELECT * from products;";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute();

		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $results;
	}

	protected function getById($id){
		$sql = "SELECT * from products WHERE id = ?;";
		$stmt = $this->connect()->prepare($sql);
		$stmt->bindValue(1, $id, PDO::PARAM_INT);
		$stmt->execute();

		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $results;
	}

	protected function getByFilters($categories, $price, $availability, $restrictions, $search){

		$ok=0;
		$count=0;
		if($categories != null){
			$sql="SELECT * FROM products WHERE (categories = ?";
		}
		else if($price != null){
			$sql="SELECT * FROM products WHERE (price BETWEEN ? AND ?";
			$ok=2;
		}
		else if($availability != null){
			$sql="SELECT * FROM products WHERE (availability LIKE ?";
			$ok=3;
		}
		else if($restrictions != null){
			$sql="SELECT * FROM products WHERE NOT (restrictions LIKE ?";
			$ok=4;
		}
		else if($search != null){
			$sql = "SELECT * from products WHERE lower(name) LIKE ?";
			$ok=5;
		}
		else{
			$sql = "SELECT * from products;";
		}

		if($categories != null){
			for($i = 1 ;$i<count($categories);$i++){
				$sql.=" OR categories = ?";
			}
			$sql.=')';
		}

		if($price != null){
			if($ok==2){
				for($i = 1 ;$i<count($price);$i++){
					$sql.=" OR price BETWEEN ? AND ?";
				}
			}
			else{
				$sql.=" AND (price BETWEEN ? AND ?";
				for($i = 1 ;$i<count($price);$i++){
					$sql.=" OR price BETWEEN ? AND ?";
				}
			}
			$sql.=')';
		}

	
		if($availability != null){
			if($ok==3){
				for($i = 1 ;$i<count($availability);$i++){
					$sql.=" OR availability LIKE ?";
				}
			}
			else{
				$sql.=" AND (availability LIKE ?";
				for($i = 1 ;$i<count($availability);$i++){
					$sql.=" OR availability LIKE ?";
				}
			}
			$sql.=')';
		}

	
		if($restrictions != null){
			if($ok==4){
				for($i = 1 ;$i<count($restrictions);$i++){
					$sql.=" OR restrictions LIKE ?";
				}
			}
			else{
				$sql.=" AND NOT (restrictions LIKE ?";
				for($i = 1 ;$i<count($restrictions);$i++){
					$sql.=" OR restrictions LIKE ?";
				}
			}
			$sql.=')';
		}

		if($search != null && $ok!=5){
				$sql.=" AND (lower(name) LIKE ?)";
		}

		$stmt = $this->connect()->prepare($sql);
		if($categories != null){
			for($i = 0 ;$i<count($categories);$i++){
				$stmt->bindValue($count+1, $categories[$i], PDO::PARAM_STR);
				$count++;
			}	
		}

		if($price != null){
			for($i = 0 ;$i<count($price);$i++){
				if($price[$i]=="priceFilter0-5"){
					$stmt->bindValue($count+1, 0, PDO::PARAM_INT);
					$stmt->bindValue($count+2, 5, PDO::PARAM_INT);
					$count=$count+2;
				}
				else if($price[$i]=="priceFilter5-10"){
					$stmt->bindValue($count+1, 5, PDO::PARAM_INT);
					$stmt->bindValue($count+2, 10, PDO::PARAM_INT);
					$count=$count+2;
				}
				else if($price[$i]=="priceFilter10-20"){
					$stmt->bindValue($count+1, 10, PDO::PARAM_INT);
					$stmt->bindValue($count+2, 20, PDO::PARAM_INT);
					$count=$count+2;
				}
				else if($price[$i]=="priceFilter20-30"){
					$stmt->bindValue($count+1, 20, PDO::PARAM_INT);
					$stmt->bindValue($count+2, 30, PDO::PARAM_INT);
					$count=$count+2;
				}
				else if($price[$i]=="priceFilter30-40"){
					$stmt->bindValue($count+1, 30, PDO::PARAM_INT);
					$stmt->bindValue($count+2, 40, PDO::PARAM_INT);
					$count=$count+2;
				}
				else if($price[$i]=="priceFilter40-50"){
					$stmt->bindValue($count+1, 40, PDO::PARAM_INT);
					$stmt->bindValue($count+2, 50, PDO::PARAM_INT);
					$count=$count+2;
				}
				else if($price[$i]=="priceFilter50+"){
					$stmt->bindValue($count+1, 50, PDO::PARAM_INT);
					$stmt->bindValue($count+2, 10000, PDO::PARAM_INT);
					$count=$count+2;
				}
			}
		}

		if($availability != null){
			for($i=0; $i<count($availability); $i++){
				$stmt->bindValue($count+1, '%'.$availability[$i].'%', PDO::PARAM_STR);
				$count++;
			}
		}

		if($restrictions != null){
			for($i=0; $i<count($restrictions); $i++){
				$stmt->bindValue($count+1, '%'.$restrictions[$i].'%', PDO::PARAM_STR);
				$count++;
			}
		}

		if($search != null){
			$stmt->bindValue($count+1, $search.'%', PDO::PARAM_STR);
		}

		$stmt->execute();
		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $results;
	}

	protected function getCountByCategory($categories){
		$sql="SELECT count(*) AS count FROM products JOIN drinkslistitems ON products.id=drinkslistitems.productsId WHERE products.categories = ?;";
		$stmt = $this->connect()->prepare($sql);
		$stmt->bindValue(1, $categories, PDO::PARAM_STR);
		$stmt->execute();

		$results = $stmt->fetch(PDO::FETCH_ASSOC);
		return $results;
	}

	protected function getCountByPrice($price1, $price2){
		$sql="SELECT count(*) AS count FROM products JOIN drinkslistitems ON products.id=drinkslistitems.productsId WHERE products.price BETWEEN ? AND ?;";
		$stmt = $this->connect()->prepare($sql);
		$stmt->bindValue(1, $price1, PDO::PARAM_INT);
		$stmt->bindValue(2, $price2, PDO::PARAM_INT);
		$stmt->execute();

		$results = $stmt->fetch(PDO::FETCH_ASSOC);
		return $results;
	}

	protected function getCountByAvailability($availability){
		$sql="SELECT count(*) AS count FROM products JOIN drinkslistitems ON products.id=drinkslistitems.productsId WHERE products.availability LIKE ?;";
		$stmt = $this->connect()->prepare($sql);
		$stmt->bindValue(1, '%'.$availability.'%', PDO::PARAM_STR);
		$stmt->execute();

		$results = $stmt->fetch(PDO::FETCH_ASSOC);
		return $results;
	}

	protected function getCountByRestrictions($restrictions){
		$sql="SELECT count(*) AS count FROM products JOIN drinkslistitems ON products.id=drinkslistitems.productsId WHERE products.restrictions LIKE ?;";
		$stmt = $this->connect()->prepare($sql);
		$stmt->bindValue(1, '%'.$restrictions.'%', PDO::PARAM_STR);
		$stmt->execute();

		$results = $stmt->fetch(PDO::FETCH_ASSOC);
		return $results;
	}


}