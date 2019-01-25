<?php
require_once('Repository.php');
require('Post.php');

class PostRepository extends Connect {
	
	function getPosts()
	{
		$db = $this->getDb();

		$req = $db->prepare('SELECT * FROM posts');
		$req->execute();
		
		$posts = [];
		
		while($data = $req-> fetch()) {
			
			$posts[] = $data;
			
		}
		
		$req->closeCursor();

		return $posts;
	}
	
		
	function addPost()
	{
		$db = $this->getDb();

		$req = $db->prepare('INSERT INTO posts(title, content, date_cont) VALUES(:title, :content, NOW())');
		$req->bindParam(':title', $_SESSION['title'], \PDO::PARAM_STR);
		$req->bindParam(':content', $_SESSION['content'], \PDO::PARAM_STR);
		$req->execute();

		$req = ('SELECT u.nom nom_user, p.content content_post, p.title title_post

				FROM posts p

				INNER JOIN user u

				ON p.id_user = u.id');
		
	}
	

}

