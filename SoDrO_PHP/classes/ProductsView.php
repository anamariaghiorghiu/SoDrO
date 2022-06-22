<?php

class ProductsView extends Products {

	public function getProductsList(){
		$array =  $this->getAll();
		for($i=0;$i<count($array);$i++){
			//$array[$i]['categories'] = json_decode($array[$i]['categories']);
			$array[$i]['restrictions'] = json_decode($array[$i]['restrictions']);
			$array[$i]['availability'] = json_decode($array[$i]['availability']);
		}
		return $array;
	}

	public function filterByCategory(){
		
	}

}