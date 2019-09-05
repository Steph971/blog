<?php
namespace App\Model;
abstract class Repository
{
 private $pdo;
 protected $database;
    protected $session;
    public function __construct()
   {
       $this->database = $this->getDb();
       $this->session  = filter_var_array($_SESSION);
   }
    
    protected function getDb() {
        
        if($this->pdo === null) {
            $this->pdo = new \PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', 'root');
        }
    
        return $this->pdo;
    }

    
}