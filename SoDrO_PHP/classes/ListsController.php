<?php

class ListsController extends Lists {
	private $name;
	
	public function __construct($name){
		$this->name = $name;
	}

	public function addList($userId){
		$this->insertList($this->name, $userId);
	}

}