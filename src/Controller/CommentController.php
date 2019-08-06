<?php

namespace App\Controller;

use \App\Model\CommentRepository;
use \App\Model\PostRepository;

class CommentController extends Controller {
	
	
	function getComments() {

		$commentRepo = new CommentRepository();
		$comment = $commentRepo->getComments(); // get validated comments (validate = 1)

		require('../src/view/afficheArticle.php');
	}
	
	function showAddComment() {
		
		$commentRepo = new CommentRepository();
		$commentRepo->addComment();
		
		
	}

	//function getCommentsByArticle(){


		//$commentRepo = new CommentRepository();
		//$comments = $commentRepo->getCommentsByArticle(); // get the comments link to the users and articles

		//echo $this->render('afficheArticle.twig', ['comments' => $comments, 'session' => $_SESSION]);
	//}

	function showCommentsValid() {

		$commentRepo = new CommentRepository();
		$coms = $commentRepo->getCommentsValid(); // get comments to validated link to the users

		echo $this->render('moderation.twig', ['coms' => $coms, 'session' => $_SESSION]);
	}

	function showValidComment(){

		$commentRepo = new CommentRepository();
		$commentRepo->validComment(); // to validate the comment
		$coms = $commentRepo->getCommentsValid(); //get comments to validated 

		echo $this->render('moderation.twig', ['coms' => $coms, 'session' => $_SESSION]);

	}

	function showSuppComment() {

		$commentRepo = new CommentRepository();
		$commentRepo->suppComment(); // delete comment from id
		$coms = $commentRepo->getCommentsValid();

		echo $this->render('moderation.twig', ['coms' => $coms, 'session' => $_SESSION]);
	}

	function showFlagComment() {

		$commentRepo = new CommentRepository();
		$commentRepo->flagComment(); // put the comment pending validation
		$comments = $commentRepo->getCommentsByArticle(); // get the comments link to the users and articles
		$postRepo = new PostRepository();
		$post = $postRepo->getPost(); // get article from id

		echo $this->render('afficheArticle.twig', ['post' => $post, 'comments' => $comments, 'session' => $_SESSION]);
	}

}

