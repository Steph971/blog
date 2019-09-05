<?php

namespace App\Model;

class Post {
	
	private $post;
	
	public function __construct() {
		
		$this->post = filter_input_array(INPUT_POST);
		
	}
	
	public function getPostArray() {
		return $this->post;
	}

	public function getPostVar(string $var) {
		return $this->post[$var];
	}

		
}

