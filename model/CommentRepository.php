<?php
require_once('Repository.php');
require('Comment.php');

class CommentRepository extends Connect {
	
	function getComments()
	{
		$db = $this->getDb();

		$req = $db->prepare('SELECT * FROM comments WHERE validate = 1');
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
		
		$req = $db->prepare('SELECT comments.id, pseudo, message, date_mess FROM comments INNER JOIN user ON id_user=user.id WHERE id_post=:id_post AND validate=1 ORDER BY id DESC');
		$req->bindParam(':id_post', $_SESSION['id_post'], \PDO::PARAM_INT);
		$req->execute();

		$comment = [];
		
		while($data = $req-> fetch()) {
			
			$comment[] = $data;
			
		}

		$req->closeCursor();

		return $comment;
	}
	
		
	function addComment()
	{
		$db = $this->getDb();
		
		$req = $db->prepare('INSERT INTO comments(id_user, id_post, message, date_mess) VALUES(:id_user, :id_post, :message, NOW())');
		$req->bindParam(':id_user', $_SESSION['idUser'], \PDO::PARAM_INT);
		$req->bindParam(':id_post', $_SESSION['id_post'], \PDO::PARAM_INT);
		$req->bindParam(':message', $_SESSION['message'], \PDO::PARAM_STR);
		$req->execute();
		
	}

	function getCommentsValid() {

		$db = $this->getDb();

		$req = $db->prepare('SELECT comments.id, pseudo, message, date_mess FROM comments INNER JOIN user ON id_user = user.id WHERE validate=0 ORDER BY id DESC');
		$req->execute();

		$coms = [];

		while($data = $req->fetch()) {
			
			$coms[] = $data;
		}

		$req->closeCursor();

		return $coms;
	}

	function validComment() {

		$db = $this->getDb();

		$req = $db->prepare('UPDATE comments SET validate = 1 WHERE id = :id');
		$req->bindParam(':id', $_SESSION['id'], \PDO::PARAM_INT);
		$req->execute();
	}

	function suppComment() {

		$db = $this->getDb();

		$req = $db->prepare('DELETE FROM comments WHERE id = :id');
		$req->bindParam(':id', $_SESSION['id'], \PDO::PARAM_INT);
		$req->execute();
	}

	function flagComment() {

		$db = $this->getDb();

		$req = $db->prepare('UPDATE comments SET validate = 0 WHERE id = :id');
		$req->bindParam(':id', $_SESSION['id'], \PDO::PARAM_INT);
		$req->execute();
	}


	

}
