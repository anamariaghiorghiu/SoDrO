<?php

class ListsView extends Lists {

	public function getAllLists($userId){
		return $this->getAll($userId);
	}

}