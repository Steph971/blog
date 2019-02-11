<?php
require_once('Repository.php');
require('Comment.php');

class CommentRepository extends Connect {
	
	function getComments()
	{
		$db = $this->getDb();

		$req = $db->prepare('SELECT * FROM comments');
		$req->execute();
		
		$comment = [];
		
		while($data = $req-> fetch()) {
			
			$comment[] = $data;
			
		}
		
		$req->closeCursor();

		return $comment;
	}


	function getCommentsByArticle()
	{
		$db = $this->getDb();

		$req = $db->prepare('SELECT * FROM `comments` INNER JOIN user ON id_user=user.id WHERE id_post=:id_post');
		$req->bindParam(':id_post', $_GET['id_post'], \PDO::PARAM_INT);
		$req = $req->execute();

		$comments = $req->fetch();

		return $comments[0];
	}
	
		
	function addComment()
	{
		$db = $this->getDb();

		$req = $db->prepare('INSERT INTO comments(id_user, id_post, message, date_mess) VALUES(:id_user, :id_post, :message, NOW())');
		$req->bindParam(':id_user', $_SESSION['id'], \PDO::PARAM_INT);
		$req->bindParam(':id_post', $_SESSION['post'], \PDO::PARAM_INT);
		$req->bindParam(':message', $_SESSION['message'], \PDO::PARAM_STR);
		$req->execute();
		
	}
	

}
