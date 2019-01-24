<?php
require_once('Repository.php');
require('User.php');

class UserRepository extends Connect {
	
	function getUsers()
	{
		$db = $this->getDb();

		$req = $db->prepare('SELECT id, pseudo, password FROM user');
		$req->execute();
		
		$users = [];
		
		while($data = $req-> fetch()) {
			
			$users[] = $data;
			
		}
		
		$req->closeCursor();

		return $users;
	}
	
		
	function addUser()
	{
		$db = $this->getDb();

		$req = $db->prepare('INSERT INTO user(pseudo, password) VALUES(:pseudo, :password)');
		$req->bindParam(':pseudo', $_SESSION['pseudo'], \PDO::PARAM_STR);
		$req->bindParam(':password', $_SESSION['password'], \PDO::PARAM_STR);
		$req->execute();
		
	}
	
	function deleteUser()														//
	{																			//
		$db = $this->getDb();													//
																				//
		$req = $db->prepare('DELETE FROM user WHERE id=:id');
		$req->bindParam(':id', $_SESSION['id'], \PDO::PARAM_INT);
			
		$req->execute();									//
	}

	function getUserById()
	{
		$db = $this->getDb();
		$req = $db->prepare('SELECT * FROM user WHERE id=:id');
		$req->bindParam(':id', $_SESSION['id'], \PDO::PARAM_INT);
			
		$req->execute();

		$users = [];
		
		while($data = $req-> fetch()) {
			
			$users[] = $data;
			
		}
		
		$req->closeCursor();

		return $users[0];

	}

	function updateUser()
	{

		$db = $this->getDb();

		$req = $db->prepare('UPDATE user SET pseudo=:pseudo, password=:password WHERE id=:id');
		$req->bindParam(':pseudo', $_SESSION['pseudo'], \PDO::PARAM_STR);
		$req->bindParam(':password', $_SESSION['password'], \PDO::PARAM_STR);
		$req->bindParam(':id', $_SESSION['id'], \PDO::PARAM_INT);
		$req->execute();
	}

	function connectUser()
	{
		$db = $this->getDb();

		$req = $db->prepare('SELECT COUNT(*) FROM user WHERE pseudo = :pseudo AND password = :password');
		$req->bindParam(':pseudo', $_SESSION['pseudo'], \PDO::PARAM_STR);
		$req->bindParam(':password', $_SESSION['password'], \PDO::PARAM_STR);
		$req->execute();
		$connect = $req->fetch();

		return $connect;
	}
}

