<?php
namespace App\Model;
/**
 * Class Repository
 * @package App\Model
 */
abstract class Repository
{
    /**
     * @var
     */
    private $pdo;
    /**
     * @var \PDO
     */
    protected $database;
    /**
     * @var mixed
     */
    protected $session;

    /**
     * Repository constructor.
     */
    public function __construct()
   {
       $this->database = $this->getDb();
       $this->session  = filter_var_array($_SESSION);
   }

    /**
     * @return \PDO
     */
    protected function getDb() 
    {
        
        if($this->pdo === null) {
            $this->pdo = new \PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', 'root');
        }
    
        return $this->pdo;
    }    
}
