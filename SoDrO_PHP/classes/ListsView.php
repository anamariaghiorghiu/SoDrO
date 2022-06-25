<?php

class ListsView extends Lists {

	public function getAllLists($userId){
		return $this->getAll($userId);
	}

	public function getListById($id){
		return $this->getById($id);
	}

	public function getListProductsById($id){
		return $this->getProductsById($id);
	}
	
	public function getItemCountByIds($listId, $productId){
		return $this->getCountByIds($listId, $productId);
	}

	public function getListItemsId($listId, $productId){
		return $this->getItemsId($listId, $productId);
	}
}