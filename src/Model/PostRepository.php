<?php

namespace App\Model;

class PostRepository extends Repository {
	
	function getLastPosts()
	{
		$database = $this->getDb();

		$req = $database->prepare('SELECT * FROM posts ORDER BY date_cont DESC LIMIT 0, 6');
		$req->execute();
		
		$posts = [];
		
		while($data = $req-> fetch()) {

			$post = new Post($data['id'], $data['title'], $data['content'], $data['author'], $data['date_cont']);
			
			$posts[] = $post;
	
		}
		
		$req->closeCursor();

		return $posts;
	}

	function getAllPosts()
	{
		$database = $this->getDb();

		$req = $database->prepare('SELECT * FROM posts ORDER BY date_cont DESC');
		$req->execute();
		
		$posts = [];
		
		while($data = $req-> fetch()) {
			
			$post = new Post($data['id'], $data['title'], $data['content'], $data['author'], $data['date_cont']);

			$posts[] = $post;
			
		}
		
		$req->closeCursor();

		return $posts;
	}

	function getPost()
	{
		$database = $this->getDb();

		$req = $database->prepare('SELECT * FROM posts WHERE id=:id');
		$req->bindParam(':id', $this->session['id_post'], \PDO::PARAM_INT);
		$req->execute();

		$post = [];
		
		while($data = $req-> fetch()) {

			$article = new Post($data['id'], $data['title'], $data['content'], $data['author'], $data['date_cont']);
			
			$post[] = $article;
			
		}
		
		$req->closeCursor();
		

		return $post;
	}
	
		
	function addPost()
	{
		$database = $this->getDb();

		$req = $database->prepare('INSERT INTO posts(title, content, author, date_cont) VALUES(:title, :content, :author, NOW())');
		$req->bindParam(':title', $this->session['title'], \PDO::PARAM_STR);
		$req->bindParam(':content', $this->session['content'], \PDO::PARAM_STR);
		$req->bindParam(':author', $this->session['pseudo'], \PDO::PARAM_STR);
		$req->execute();
		
	}

	function selectPost()
	{
		$database = $this->getDb();
		$req = $database->prepare('SELECT * FROM posts WHERE id=:id');
		$req->bindParam(':id', $this->session['id'], \PDO::PARAM_INT);
		$req->execute();

		$posts = [];

		while($data = $req-> fetch()) {

			$post = new Post($data['id'], $data['title'], $data['content'], $data['author'], $data['date_cont']);

			$posts[] = $post;
		}

		$req->closeCursor();

		return $posts[0];

	}

	function updatePost()
	{
		$database = $this->getDb();
		$req = $database->prepare('UPDATE posts SET title=:title,content=:content,date_cont= NOW() WHERE id=:id');
		$req->bindParam(':title', $this->session['title'], \PDO::PARAM_STR);
		$req->bindParam(':content', $this->session['content'], \PDO::PARAM_STR);
		$req->bindParam(':id', $this->session['id'], \PDO::PARAM_INT);
		$req->execute();
	}

	function deletePost()
	{
		$database = $this->getDb();
		$req = $database->prepare('DELETE FROM posts WHERE id=:id');
		$req->bindParam(':id', $this->session['id'], \PDO::PARAM_INT);
		$req->execute();

	}

}

