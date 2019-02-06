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

	function getPost()
	{
		$db = $this->getDb();

		$req = $db->prepare('SELECT * FROM posts WHERE id=:id');
		$req->execute();
		
		$posts = [];
		

		return $post;
	}
	
		
	function addPost()
	{
		$db = $this->getDb();

		$req = $db->prepare('INSERT INTO posts(title, content, author, date_cont) VALUES(:title, :content, :author, NOW())');
		$req->bindParam(':title', $_SESSION['title'], \PDO::PARAM_STR);
		$req->bindParam(':content', $_SESSION['content'], \PDO::PARAM_STR);
		$req->bindParam(':author', $_SESSION['pseudo'], \PDO::PARAM_STR);
		$req->execute();
		
	}

	function selectPost()
	{
		$db = $this->getDb();
		$req = $db->prepare('SELECT * FROM posts WHERE id=:id');
		$req->bindParam(':id', $_SESSION['id'], \PDO::PARAM_INT);
		$req->execute();

		$posts = [];

		while($data = $req-> fetch()) {

			$posts[] = $data;
		}

		$req->closeCursor();

		return $posts[0];

	}

	function updatePost()
	{
		$db = $this->getDb();
		$req = $db->prepare('UPDATE posts SET title=:title,content=:content,date_cont= NOW() WHERE id=:id');
		$req->bindParam(':title', $_SESSION['title'], \PDO::PARAM_STR);
		$req->bindParam(':content', $_SESSION['content'], \PDO::PARAM_STR);
		$req->bindParam(':id', $_SESSION['id'], \PDO::PARAM_INT);
		$req->execute();
	}

	function deletePost()
	{
		$db = $this->getDb();
		$req = $db->prepare('DELETE FROM posts WHERE id=:id');
		$req->bindParam(':id', $_SESSION['id'], \PDO::PARAM_INT);
		$req->execute();

	}

}

