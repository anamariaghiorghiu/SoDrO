<?php

class ProductsView extends Products {

	public function getAllProducts(){
		$array =  $this->getAll();
		for($i=0;$i<count($array);$i++){
			$array[$i]['restrictions'] = json_decode($array[$i]['restrictions']);
			$array[$i]['availability'] = json_decode($array[$i]['availability']);
		}
		return $array;
	}

	public function getProductById($id){
		$array = $this->getById($id);
		for($i=0;$i<count($array);$i++){
			$array[$i]['restrictions'] = json_decode($array[$i]['restrictions']);
			$array[$i]['availability'] = json_decode($array[$i]['availability']);
		}
		return $array;
	}

	public function getProductsByFilters($categories, $price, $availability, $restrictions, $search){
		$array = $this->getByFilters($categories, $price, $availability, $restrictions, $search);
		for($i=0;$i<count($array);$i++){
			$array[$i]['restrictions'] = json_decode($array[$i]['restrictions']);
			$array[$i]['availability'] = json_decode($array[$i]['availability']);
		}
		return $array;
	}

	public function getProductsCountByCategory($categories){
		return $this->getCountByCategory($categories);
	}

	public function getProductsCountByPrice($price1, $price2){
		return $this->getCountByPrice($price1, $price2);
	}

	public function getProductsCountByAvailability($availability){
		return $this->getCountByAvailability($availability);
	}

	public function getProductsCountByRestrictions($restrictions){
		return $this->getCountByRestrictions($restrictions);
	}
	
}