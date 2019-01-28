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

		var_dump($_SESSION['pseudo']);

		$req = $db->prepare('INSERT INTO posts(title, content, author, date_cont) VALUES(:title, :content, :author, NOW())');
		$req->bindParam(':title', $_SESSION['title'], \PDO::PARAM_STR);
		$req->bindParam(':content', $_SESSION['content'], \PDO::PARAM_STR);
		$req->bindParam(':author', $_SESSION['pseudo'], \PDO::PARAM_STR);
		$req->execute();
		
	}
	

}

