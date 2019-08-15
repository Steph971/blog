<?php

namespace App\Model;

abstract class Repository
{

	protected $session;

	public function __construct()
    { 
        $this->session = filter_var_array($_SESSION);
    }

	private $database;
	
	protected function getDb() {
		
		if($this->database === null) {
			
			$bdd = new \PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', 'root');
			
			$this->database = $bdd;
		}
	
		return $this->database;
		
	}
}
