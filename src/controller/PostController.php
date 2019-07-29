<?php
namespace App\Controller;

//use App\model\PostRepository;
//use App\Controller\Controller;
//require('../src/model/PostRepository.php');
require_once('Controller.php');

class PostController extends Controller {
	
	function listPosts() {
		
		$postRepo = new PostRepository();
		$posts = $postRepo->getPosts(); // get articles in descending order
		
		echo $this->render('home.twig', ['posts' => $posts, 'session' => $_SESSION]);
				
	}

	function getAllPosts() {
		
		$postRepo = new PostRepository();
		$posts = $postRepo->getAllPosts(); // get all articles
		
		echo $this->render('listeArticles.twig', ['posts' => $posts, 'session' => $_SESSION]);
	}
	
	function getPost() {

		$postRepo = new PostRepository();
		$post = $postRepo->getPost(); // get article from id
		$commentRepo = new CommentRepository();
		$comments = $commentRepo->getCommentsByArticle(); // get the comments link to the users
		echo $this->render('afficheArticle.twig', ['post' => $post, 'comments' => $comments, 'session' => $_SESSION]);

	}

	//function addPosts(){

		//require('../src/view/addposts.php');

	//}
	function addPost() {
		
		$postRepo = new PostRepository();
		$postRepo->addPost(); // add article
		
		$posts = $postRepo->getPosts();
		
		echo $this->render('home.twig', ['posts' => $posts, 'session' => $_SESSION]);
		
	}

	function selectPost() {

		$postRepo = new PostRepository();
		$article = $postRepo->selectPost(); // get articles from id
		echo $this->render('selectPost.twig', ['posts' => $posts, 'session' => $_SESSION]);
	}

	function updatePost() {

		$postRepo = new PostRepository();
		$postRepo->updatePost(); // update article from id
		$posts = $postRepo->getPosts(); 
		echo $this->render('home.twig', ['posts' => $posts, 'session' => $_SESSION]);
	}
	
	function deletePost() {

		$postRepo = new PostRepository();
		$postRepo->deletePost(); // delete article from id
		$posts = $postRepo->getPosts();
		echo $this->render('home.twig', ['posts' => $posts, 'session' => $_SESSION]);
	}
	
}
