<?php
namespace App\Controller;

use \App\Model\PostRepository;
use \App\Model\CommentRepository;

class PostController extends Controller {
	
	function listPosts() {
		
		$postRepo = new PostRepository();
		$posts = $postRepo->getLastPosts(); // get articles in descending order
		
		echo $this->render('home.twig', ['posts' => $posts, 'session' => $_SESSION]);
				
	}

	function showAllPosts() {
		
		$postRepo = new PostRepository();
		$posts = $postRepo->getAllPosts(); // get all articles
		
		echo $this->render('listeArticles.twig', ['posts' => $posts, 'session' => $_SESSION]);
	}
	
	function showPost() {

		$postRepo = new PostRepository();
		$post = $postRepo->getPost(); // get article from id
		$commentRepo = new CommentRepository();
		$comments = $commentRepo->getCommentsByArticle(); // get the comments link to the users
		echo $this->render('afficheArticle.twig', ['post' => $post, 'comments' => $comments, 'session' => $_SESSION]);

	}

	//function addPosts(){

		//require('../src/view/addposts.php');

	//}
	function showAddPost() {
		
		$postRepo = new PostRepository();
		$postRepo->addPost(); // add article
		
		$posts = $postRepo->getLastPosts();
		
		echo $this->render('home.twig', ['posts' => $posts, 'session' => $_SESSION]);
		
	}

	function showSelectPost() {

		$postRepo = new PostRepository();
		$article = $postRepo->selectPost(); // get articles from id
		echo $this->render('selectPost.twig', ['article' => $article, 'session' => $_SESSION]);
	}

	function showUpdatePost() {

		$postRepo = new PostRepository();
		$postRepo->updatePost(); // update article from id
		$posts = $postRepo->getLastPosts(); 
		echo $this->render('home.twig', ['posts' => $posts, 'session' => $_SESSION]);
	}
	
	function showDeletePost() {

		$postRepo = new PostRepository();
		$postRepo->deletePost(); // delete article from id
		$posts = $postRepo->getLastPosts();
		echo $this->render('home.twig', ['posts' => $posts, 'session' => $_SESSION]);
	}
	
}
