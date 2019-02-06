<?php
require('../model/CommentRepository.php');

class CommentController {
	
	function listComments() {
		
		$commentRepo = new CommentRepository();
		$comments = $commentRepo->getComment();
		
		require('../view/afficheArticle.php');
		
	}
	
	function addComment() {
		
		$commentRepo = new CommentRepository();
		$commentRepo->addComment();
		
		$Comments = $commentRepo->getComment();
		
		require('../view/comArticles.php');
		
	}
}

