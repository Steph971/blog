<?php
require('../model/PostRepository.php');
require('../model/CommentRepository.php');

class PostController {
	
	function listPosts() {
		
		$postRepo = new PostRepository();
		$posts = $postRepo->getPosts();
		
		require('../view/listeArticles.php');
		
	}
	
	function getpost() {

		$postRepo = new PostRepository();
		$post = $postRepo->getPost();
		$commentRepo = new CommentRepository();
		$comments = $commentRepo->getCommentsByArticle();
		
		require('../view/afficheArticle.php');

	}
	function addPost() {
		
		$postRepo = new PostRepository();
		$postRepo->addPost();
		
		$posts = $postRepo->getPosts();
		
		require('../view/listeArticles.php');
		
	}

	function selectPost() {

		$postRepo = new PostRepository();
		$article = $postRepo->selectPost();
		require('../view/selectPost.php');
	}

	function updatePost() {

		$postRepo = new PostRepository();
		$postRepo->updatePost();
		$posts = $postRepo->getPosts();
		require('../view/listeArticles.php');
	}
	
	function deletePost() {

		$postRepo = new PostRepository();
		$postRepo->deletePost();
		$posts = $postRepo->getPosts();
		require('../view/listeArticles.php');
	}
	
}
