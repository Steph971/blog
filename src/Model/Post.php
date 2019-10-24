<?php

namespace App\Model;

/**
 * Class Post
 * @package App\Model
 */
class Post 
{

    /**
     * @var mixed
     */
    private $post;

    /**
     * Post constructor.
     */
    public function __construct() 
    {
		$this->post = filter_input_array(INPUT_POST);	
	}

    /**
     * @return mixed
     */
    public function getPostArray() 
    {
		return $this->post;
	}

    /**
     * @param string $var
     * @return mixed
     */
    public function getPostVar(string $var) 
    {
		return $this->post[$var];
	}		
}
