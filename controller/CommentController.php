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
}

