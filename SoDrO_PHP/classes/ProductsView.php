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

	public function getProductsByFilters($categories, $price, $availability, $restrictions){
		$array = $this->getByFilters($categories, $price, $availability, $restrictions);
		for($i=0;$i<count($array);$i++){
			$array[$i]['restrictions'] = json_decode($array[$i]['restrictions']);
			$array[$i]['availability'] = json_decode($array[$i]['availability']);
		}
		return $array;
	}
	
}