<?php

class User {
	
	private $id;
	private $username;
	private $password;
	
	public function __construct($id, $username, $password) {
		
		$this->id = $id;
		$this->username = $username;
		$this->password = $password;
		
	}
	
	public function getId() {
		return $this->id;
	}

	public function getUsername() { // get pour recuperer la valeur d'une variable
		return $this->username;
	}
	
	public function getPassword() {
		return $this->password;
	}
	
	public function setId($id) {
		
		$this->id = $id;
		
	}

	public function setUsername($username) { // set pour affecter une valeur a l'attribut
		
		$this->username = $username;
		
	}
	
	public function setPassword($password) {
		
		$this->password = $password;
		
	}
	
}

