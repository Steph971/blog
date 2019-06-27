<?php
require('../src/model/CommentRepository.php');

class CommentController {
	
	
	function getComments() {

		$commentRepo = new CommentRepository();
		$comment = $commentRepo->getComments(); // get validated comments (validate = 1)

		require('../src/view/afficheArticle.php');
	}
	
	function addComment() {
		
		$commentRepo = new CommentRepository();
		$commentRepo->addComment();
		
		
	}

	function getCommentsByArticle(){


		$commentRepo = new CommentRepository();
		$comments = $commentRepo->getCommentsByArticle(); // get the comments link to the users and articles

		require('../src/view/afficheArticle.php');
	}

	function getCommentsValid() {

		$commentRepo = new CommentRepository();
		$coms = $commentRepo->getCommentsValid(); // get comments to validated link to the users

		require('../src/view/moderation.php');
	}

	function validComment(){

		$commentRepo = new CommentRepository();
		$commentRepo->validComment(); // to validate the comment
		$coms = $commentRepo->getCommentsValid(); //get comments to validated 

		require('../src/view/moderation.php');

	}

	function suppComment() {

		$commentRepo = new CommentRepository();
		$commentRepo->suppComment(); // delete comment from id
		$coms = $commentRepo->getCommentsValid();

		require('../src/view/moderation.php');
	}

	function flagComment() {

		$commentRepo = new CommentRepository();
		$commentRepo->flagComment(); // put the comment pending validation
		$comments = $commentRepo->getCommentsByArticle(); // get the comments link to the users and articles
		$postRepo = new PostRepository();
		$post = $postRepo->getPost(); // get article from id

		require('../src/view/afficheArticle.php');
	}

}

