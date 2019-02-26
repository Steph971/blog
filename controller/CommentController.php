<?php
require('../model/CommentRepository.php');

class CommentController {
	
	
	function getComments() {

		$commentRepo = new CommentRepository();
		$comment = $commentRepo->getComments();

		require('../view/afficheArticle.php');
	}
	
	function addComment() {
		
		$commentRepo = new CommentRepository();
		$commentRepo->addComment();
		
		
	}

	function getCommentsByArticle(){


		$commentRepo = new CommentRepository();
		$comments = $commentRepo->getCommentsByArticle();

		require('../view/afficheArticle.php');
	}

	function getCommentsValid() {

		$commentRepo = new CommentRepository();
		$coms = $commentRepo->getCommentsValid();

		require('../view/moderation.php');
	}

	function validComment(){

		$commentRepo = new CommentRepository();
		$commentRepo->validComment();
		$coms = $commentRepo->getCommentsValid();

		require('../view/moderation.php');

	}

	function suppComment() {

		$commentRepo = new CommentRepository();
		$commentRepo->suppComment();
		$coms = $commentRepo->getCommentsValid();

		require('../view/moderation.php');
	}

	function flagComment() {

		$commentRepo = new CommentRepository();
		$commentRepo->flagComment();
		$comments = $commentRepo->getCommentsByArticle();
		$postRepo = new PostRepository();
		$post = $postRepo->getPost();

		require('../view/afficheArticle.php');
	}

}

