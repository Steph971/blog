<?php
require('../model/PostRepository.php');

class PostController {
	
	function listPosts() {
		
		$postRepo = new PostRepository();
		$posts = $postRepo->getPosts();
		
		require('../view/listeArticles.php');
		
	}
	
	function addPost() {
		
		$postRepo = new PostRepository();
		$postRepo->addPost();
		
		$posts = $postRepo->getPosts();
		
		require('../view/listeArticles.php');
		
	}
	
	
}
