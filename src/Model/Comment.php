<?php

namespace App\Model;

/**
 * Class Comment
 * @package App\Model
 */
class Comment 
{

    /**
     * @var
     */
    private $id;
    /**
     * @var
     */
    private $pseudo;
    /**
     * @var
     */
    private $message;
    /**
     * @var
     */
    private $date_mess;

    /**
     * Comment constructor.
     * @param $id
     * @param $pseudo
     * @param $message
     * @param $date_mess
     */
    public function __construct($id, $pseudo, $message, $date_mess) 
    {
		
		$this->id = $id;
		$this->pseudo = $pseudo;
		$this->message = $message;
		$this->date_mess = $date_mess;	
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
    public function getPseudo() 
    {
		return $this->pseudo;
	}

    /**
     * @return mixed
     */
    public function getMessage() 
    {
		return $this->message;
	}

    /**
     * @return mixed
     */
    public function getDate_mess() 
    {
		return $this->date_mess;
	}

    /**
     * @param $id
     */
    public function setId($id) 
    {	
		$this->id = $id;	
	}

    /**
     * @param $message
     */
    public function setMessage($message) 
    {
		$this->message = $message;
	}

    /**
     * @param $date_mess
     */
    public function setDate_mess($date_mess) 
    {
		$this->date_mess = $date_mess;		
	}	
}
