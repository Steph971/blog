<?php

namespace App\Model;

class Post {
	
	private $id;
	private $title;
	private $content;
	private $author;
	private $date_cont;
	
	public function __construct($id, $title, $content, $author, $date_cont) {
		
		$this->id = $id;
		$this->title = $title;
		$this->content = $content;
		$this->author = $author;
		$this->date_cont = $date_cont;
		
	}
	
	public function getId() {
		return $this->id;
	}

	public function getTitle() {
		return $this->title;
	}
	
	public function getContent() {
		return $this->content;
	}

	public function getAuthor() {
		return $this->author;
	}

	public function getDate_cont() {
		return $this->date_cont;
	}

	public function setId($id) {
		
		$this->id = $id;
		
	}
	
	public function setTitle($title) {
		
		$this->title = $title;
		
	}
	
	public function setContent($content) {
		
		$this->content = $content;
		
	}

	public function setAuthor($author) {
		
		$this->title = $author;
		
	}

	public function setDate_cont($date_cont) {
		
		$this->title = $date_cont;
		
	}
	
}

