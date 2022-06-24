<?php

class ListsController extends Lists {

	public function createList($name, $userId){
		$this->insertList($name, $userId);
	}

	public function deleteListById($id){
		$this->deleteById($id);
	}

	public function updateListNameById($id, $name){
		$this->updateNameById($id, $name);
	}

	public function addListItem($listId, $productId){
		$this->addItem($listId, $productId);
	}

}