<?php
require('../src/model/PostRepository.php');

class PostController {
	
	function listPosts() {
		
		$postRepo = new PostRepository();
		$posts = $postRepo->getPosts(); // get articles in descending order
		
		require('../src/view/home.php'); 
				
	}

	function getAllPosts() {
		
		$postRepo = new PostRepository();
		$posts = $postRepo->getAllPosts(); // get all articles
		
		require('../src/view/listeArticles.php');
	}
	
	function getPost() {

		$postRepo = new PostRepository();
		$post = $postRepo->getPost(); // get article from id
		$commentRepo = new CommentRepository();
		$comments = $commentRepo->getCommentsByArticle(); // get the comments link to the users
		require('../src/view/afficheArticle.php');

	}

	function addPosts(){

		require('../src/view/addposts.php');

	}
	function addPost() {
		
		$postRepo = new PostRepository();
		$postRepo->addPost(); // add article
		
		$posts = $postRepo->getPosts();
		
		require('../src/view/home.php');
		
	}

	function selectPost() {

		$postRepo = new PostRepository();
		$article = $postRepo->selectPost(); // get articles from id
		require('../src/view/selectPost.php');
	}

	function updatePost() {

		$postRepo = new PostRepository();
		$postRepo->updatePost(); // update article from id
		$posts = $postRepo->getPosts(); 
		require('../src/view/home.php');
	}
	
	function deletePost() {

		$postRepo = new PostRepository();
		$postRepo->deletePost(); // delete article from id
		$posts = $postRepo->getPosts();
		require('../src/view/home.php');
	}
	
}
