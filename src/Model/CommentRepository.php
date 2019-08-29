<?php

namespace App\Model;

class CommentRepository extends Repository {

	private function getComs($req)
    {
        $comment = [];
		
		while($data = $req-> fetch()) {

			$com = new Comment($data['id'], $data['pseudo'], $data['message'], $data['date_mess']);
			
			$comment[] = $com;	
		}
		$req->closeCursor();

		return $comment;
    }
	
	function getComments()
	{
		$req = $this->database->prepare('SELECT * FROM comments WHERE validate = 1');
		$req->execute();
		
		return $this->getComs($req);
	}


	function getCommentsByArticle()
	{
		$req = $this->database->prepare('SELECT comments.id, pseudo, message, date_mess FROM comments INNER JOIN user ON id_user=user.id WHERE id_post=:id_post AND validate=1 ORDER BY date_mess DESC');
		$req->bindParam(':id_post', $this->session['id_post'], \PDO::PARAM_INT);
		$req->execute();

		return $this->getComs($req);
	}
	
		
	function addComment()
	{
		$req = $this->database->prepare('INSERT INTO comments(id_user, id_post, message, date_mess) VALUES(:id_user, :id_post, :message, NOW())');
		$req->bindParam(':id_user', $this->session['idUser'], \PDO::PARAM_INT);
		$req->bindParam(':id_post', $this->session['id_post'], \PDO::PARAM_INT);
		$req->bindParam(':message', $this->session['message'], \PDO::PARAM_STR);
		$req->execute();
		
	}

	function getCommentsValid() 
	{
		$req = $this->database->prepare('SELECT comments.id, pseudo, message, date_mess FROM comments INNER JOIN user ON id_user = user.id WHERE validate=0 ORDER BY date_mess DESC');
		$req->execute();

		return $this->getComs($req);
	}

	function validComment() 
	{
		$req = $this->database->prepare('UPDATE comments SET validate = 1 WHERE id = :id');
		$req->bindParam(':id', $this->session['id'], \PDO::PARAM_INT);
		$req->execute();
	}

	function suppComment() 
	{
		$req = $this->database->prepare('DELETE FROM comments WHERE id = :id');
		$req->bindParam(':id', $this->session['id'], \PDO::PARAM_INT);
		$req->execute();
	}

	function flagComment() 
	{
		$req = $this->database->prepare('UPDATE comments SET validate = 0 WHERE id = :id');
		$req->bindParam(':id', $this->session['id'], \PDO::PARAM_INT);
		$req->execute();
	}
}
