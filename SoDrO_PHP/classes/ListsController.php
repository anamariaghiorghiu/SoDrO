<?php

class ListsController extends Lists {
	private $name;
	
	public function __construct($name){
		$this->name = $name;
	}

	public function addList($userId){
		$this->insertList($this->name, $userId);
	}

	public function deleteListById($id){
		$this->deleteById($id);
	}

	public function updateListNameById($id, $name){
		$this->name=$this->updateNameById($id, $name);
	}

}