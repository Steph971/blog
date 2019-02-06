<?php
require_once('Repository.php');
require('Comment.php');

class CommentRepository extends Connect {
	
	function getComment()
	{
		$db = $this->getDb();

		$req = $db->prepare('SELECT * FROM comments');
		$req->execute();
		
		$comments = [];
		
		while($data = $req-> fetch()) {
			
			$comments[] = $data;
			
		}
		
		$req->closeCursor();

		return $comments;
	}


	
		
	function addComment()
	{
		$db = $this->getDb();

		$req = $db->prepare('INSERT INTO comments(name, message, date_mess) VALUES(:name, :message, NOW())');
		$req->bindParam(':name', $_SESSION['pseudo'], \PDO::PARAM_STR);
		$req->bindParam(':message', $_SESSION['message'], \PDO::PARAM_STR);
		$req->execute();
		
	}
	

}
