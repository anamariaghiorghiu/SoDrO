<?php 

class UsersView extends Users {
		private $id;

		public function __construct($id){
			$this->id=$id;
		}
		public function getUsersName(){
			return $this->getName($this->id);
		}

		public function getUsersUid(){
			return $this->getUid($this->id);
		}

		public function getUsersEmail(){
			return $this->getEmail($this->id);
		}

		public function getUsersBio(){
			return $this->getBio($this->id);
		}

}
