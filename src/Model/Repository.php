<?php

namespace App\Model;

abstract class Repository
{

	protected $session;

	public function __construct()
    { 
        $this->session = filter_var_array($_SESSION);
    }
    
	private $db;
	
	protected function getDb() {
		
		if($this->db === null) {
			
			$bdd = new \PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', 'root');
			
			$this->db = $bdd;
		}
	
		return $this->db;
		
	}
}
