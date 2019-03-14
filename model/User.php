<?php

class User {
	
	private $username;
	private $password;
	
	public function __construct($username, $password) {
		
		$this->username = $username;
		$this->password = $password;
		
	}
	
	public function getUsername() { // get pour recuperer la valeur d'une variable
		return $this->username;
	}
	
	public function getPassword() {
		return $this->password;
	}
	
	public function setUsername($username) { // set pour affecter une valeur a l'attribut
		
		$this->username = $username;
		
	}
	
	public function setPassword($password) {
		
		$this->password = $password;
		
	}
	
}

