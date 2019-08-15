<?php

namespace App\Model;

class CommentRepository extends Repository {
	
	function getComments()
	{
		$database = $this->getDb();

		$req = $database->prepare('SELECT * FROM comments WHERE validate = 1');
		$req->execute();
		
		$comment = [];
		
		while($data = $req-> fetch()) {

			$com = new Comment($data['id'], $data['message'], $data['date_mess']);
			
			$comment[] = $com;
			
		}
		
		$req->closeCursor();

		return $comment;
	}


	function getCommentsByArticle()
	{
		$database = $this->getDb();
		
		$req = $database->prepare('SELECT comments.id, pseudo, message, date_mess FROM comments INNER JOIN user ON id_user=user.id WHERE id_post=:id_post AND validate=1 ORDER BY date_mess DESC');
		$req->bindParam(':id_post', $this->session['id_post'], \PDO::PARAM_INT);
		$req->execute();

		$comment = [];
		
		while($data = $req-> fetch()) {

			$com = new Comment($data['id'], $data['pseudo'], $data['message'], $data['date_mess']);
			
			$comment[] = $com;
			
		}

		$req->closeCursor();

		return $comment;
	}
	
		
	function addComment()
	{
		$database = $this->getDb();
		
		$req = $database->prepare('INSERT INTO comments(id_user, id_post, message, date_mess) VALUES(:id_user, :id_post, :message, NOW())');
		$req->bindParam(':id_user', $this->session['idUser'], \PDO::PARAM_INT);
		$req->bindParam(':id_post', $this->session['id_post'], \PDO::PARAM_INT);
		$req->bindParam(':message', $this->session['message'], \PDO::PARAM_STR);
		$req->execute();
		
	}

	function getCommentsValid() {

		$database = $this->getDb();

		$req = $database->prepare('SELECT comments.id, pseudo, message, date_mess FROM comments INNER JOIN user ON id_user = user.id WHERE validate=0 ORDER BY date_mess DESC');
		$req->execute();

		$coms = [];

		while($data = $req->fetch()) {

			$com = new Comment($data['id'], $data['pseudo'], $data['message'], $data['date_mess']);
			
			$coms[] = $com;
		}

		$req->closeCursor();

		return $coms;
	}

	function validComment() {

		$database = $this->getDb();

		$req = $database->prepare('UPDATE comments SET validate = 1 WHERE id = :id');
		$req->bindParam(':id', $this->session['id'], \PDO::PARAM_INT);
		$req->execute();
	}

	function suppComment() {

		$database = $this->getDb();

		$req = $database->prepare('DELETE FROM comments WHERE id = :id');
		$req->bindParam(':id', $this->session['id'], \PDO::PARAM_INT);
		$req->execute();
	}

	function flagComment() {

		$database = $this->getDb();

		$req = $database->prepare('UPDATE comments SET validate = 0 WHERE id = :id');
		$req->bindParam(':id', $this->session['id'], \PDO::PARAM_INT);
		$req->execute();
	}


	

}
