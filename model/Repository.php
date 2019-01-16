<?php
abstract class Connect
{
	private $db;
	
	protected function getDb() {
		
		if($this->db === null) {
			
			$bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', 'root');
			
			$this->db = $bdd;
		}
	
		return $this->db;
		
	}
}
