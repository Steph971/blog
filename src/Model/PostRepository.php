<?php

namespace App\Model;

class PostRepository extends Repository {

    private function getPosts($req)
    {
        $posts = [];

        while($data = $req-> fetch()) {
            
            $posts[] = $data;
        }

        $req->closeCursor();

        return $posts;
    }

    public function getLastPosts()
    {
        $req = $this->database->prepare('SELECT * FROM posts ORDER BY date_cont DESC LIMIT 0, 6');
        $req->execute();

        return $this->getPosts($req);
    }

    public function getAllPosts()
    {
        $req = $this->database->prepare('SELECT * FROM posts ORDER BY date_cont DESC');
        $req->execute();

        return $this->getPosts($req);
    }

	public function getPost()
	{
		$req = $this->database->prepare('SELECT * FROM posts WHERE id=:id');
		$req->bindParam(':id', $this->session['id_post'], \PDO::PARAM_INT);
		$req->execute();

		$post = [];
		
		while($data = $req-> fetch()) {

			$post[] = $data;
			
		}
		
		$req->closeCursor();
		

		return $post;
	}
	
		
	public function addPost()
	{
		$req = $this->database->prepare('INSERT INTO posts(title, content, author, date_cont) VALUES(:title, :content, :author, NOW())');
		$req->bindParam(':title', $this->session['title'], \PDO::PARAM_STR);
		$req->bindParam(':content', $this->session['content'], \PDO::PARAM_STR);
		$req->bindParam(':author', $this->session['pseudo'], \PDO::PARAM_STR);
		$req->execute();
		
	}

	public function selectPost()
	{
		$req = $this->database->prepare('SELECT * FROM posts WHERE id=:id');
		$req->bindParam(':id', $this->session['id'], \PDO::PARAM_INT);
		$req->execute();

		$posts = [];

		while($data = $req-> fetch()) {

			//$this->post = new Post();
			//$this->data['id'] = $this->post->getPostVar('id');
           // $this->data['title'] = $this->post->getPostVar('title');
           // $this->data['content'] = $this->post->getPostVar('content');
            //$this->data['author'] = $this->post->getPostVar('author');
           // $this->data['date_cont'] = $this->post->getPostVar('date_cont');

			$posts[] = $data;
		}

		$req->closeCursor();

		return $posts[0];

	}

	public function updatePost()
	{
		$req = $this->database->prepare('UPDATE posts SET title=:title,content=:content,date_cont= NOW() WHERE id=:id');
		$req->bindParam(':title', $this->session['title'], \PDO::PARAM_STR);
		$req->bindParam(':content', $this->session['content'], \PDO::PARAM_STR);
		$req->bindParam(':id', $this->session['id'], \PDO::PARAM_INT);
		$req->execute();
	}

	public function deletePost()
	{
		$req = $this->database->prepare('DELETE FROM posts WHERE id=:id');
		$req->bindParam(':id', $this->session['id'], \PDO::PARAM_INT);
		$req->execute();

	}
}

