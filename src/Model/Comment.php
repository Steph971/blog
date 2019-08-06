<?php

namespace App\Model;

class Comment {
	
	private $id;
	private $pseudo;
	private $message;
	private $date_mess;
	
	public function __construct($id, $pseudo,$message, $date_mess) {
		
		$this->id = $id;
		$this->pseudo = $pseudo;
		$this->message = $message;
		$this->date_mess = $date_mess;
		
	}
	
	
	public function getId() {
		return $this->id;
	}

	public function getPseudo() {
		return $this->pseudo;
	}

	public function getMessage() {
		return $this->message;
	}

	public function getDate_mess() {
		return $this->date_mess;
	}
	
	public function setId($id) {
		
		$this->id = $id;
		
	}

	public function setMessage($message) {
		
		$this->message = $message;
		
	}

	public function setDate_mess($date_mess) {
		
		$this->date_mess = $date_mess;
		
	}
	
}

