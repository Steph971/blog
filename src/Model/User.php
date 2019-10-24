<?php

namespace App\Model;

/**
 * Class User
 * @package App\Model
 */
class User 
{

    /**
     * @var
     */
    private $id;
    /**
     * @var
     */
    private $username;
    /**
     * @var
     */
    private $password;

    /**
     * User constructor.
     * @param $id
     * @param $username
     * @param $password
     */
    public function __construct($id, $username, $password) 
    {
		
		$this->id = $id;
		$this->username = $username;
		$this->password = $password;	
	}

    /**
     * @return mixed
     */
    public function getId() 
    {
		return $this->id;
	}

    /**
     * @return mixed
     */
    public function getUsername() // get pour recuperer la valeur d'une variable
    { 
		return $this->username;
	}

    /**
     * @return mixed
     */
    public function getPassword() 
    {
		return $this->password;
	}

    /**
     * @param $id
     */
    public function setId($id) 
    {
		
		$this->id = $id;
		
	}

    /**
     * @param $username
     */
    public function setUsername($username) // set pour affecter une valeur a l'attribut
    { 
		
		$this->username = $username;
		
	}

    /**
     * @param $password
     */
    public function setPassword($password) 
    {
		
		$this->password = $password;
		
	}	
}
