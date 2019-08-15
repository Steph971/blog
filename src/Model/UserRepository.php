<?php

namespace App\Model;

class UserRepository extends Repository  {
	
	function getUsers()
	{
		$database = $this->getDb();

		$req = $database->prepare('SELECT id, pseudo, password FROM user');
		$req->execute();
		
		$users = [];
		
		while($data = $req-> fetch()) {
			
			
			$user = new User($data['id'], $data['pseudo'] , $data['password']);
			
			$users[] = $user;
			
		}
		
		$req->closeCursor();

		return $users;
	}
	
		
	function addUser()
	{
		$database = $this->getDb();

		$hashpass= password_hash($this->session['password'], PASSWORD_DEFAULT);
		$req = $database->prepare('INSERT INTO user(pseudo, password) VALUES(:pseudo, :password)'); 
		$req->bindParam(':pseudo', $this->session['pseudo'], \PDO::PARAM_STR);
		$req->bindParam(':password', $hashpass, \PDO::PARAM_STR);
		$req->execute();
		
	}
	
	function deleteUser()														//
	{																			//
		$database = $this->getDb();													//
	
		$req = $database->prepare('DELETE FROM user WHERE id=:id');
		$req->bindParam(':id', $this->session['id'], \PDO::PARAM_INT);
			
		$req->execute();									//
	}

	function getUserById()
	{
		$database = $this->getDb();
		$req = $database->prepare('SELECT * FROM user WHERE id=:id');
		$req->bindParam(':id', $this->session['id'], \PDO::PARAM_INT);
			
		$req->execute();

		$users = [];
		
		while($data = $req-> fetch()) {

			$user = new User($data['id'], $data['pseudo'], $data['password']);
			
			$users[] = $user;
			
		}
		
		$req->closeCursor();

		return $users[0];

	}

	function updateUser()
	{

		$database = $this->getDb();
		
		$hashpass= password_hash($this->session['password'], PASSWORD_DEFAULT);
		$req = $database->prepare('UPDATE user SET pseudo=:pseudo, password=:password WHERE id=:id');
		$req->bindParam(':pseudo', $this->session['pseudo'], \PDO::PARAM_STR);
		$req->bindParam(':password', $hashpass, \PDO::PARAM_STR);
		$req->bindParam(':id', $this->session['id'], \PDO::PARAM_INT);
		$req->execute();
	}

	function connectUser()
	{
		$database = $this->getDb();

		$req = $database->prepare('SELECT * FROM user WHERE pseudo = :pseudo');
		$req->bindParam(':pseudo', $this->session['pseudo'], \PDO::PARAM_STR);
		$req->execute();

		$users = [];
		
		while($data = $req-> fetch()) {

			$user = new User($data['id'], $data['pseudo'], $data['password']);
			
			$users[] = $user;
		}
		
		$req->closeCursor();

		if (isset($users[0])){

			return password_verify($this->session['password'], $users[0]->getPassword());
		}else{
			return false;
		}
	}

	function getConnectUser() {

		$database = $this->getDb();

		$req = $database->prepare('SELECT id FROM user WHERE pseudo=:pseudo');
		$req->bindParam(':pseudo', $this->session['pseudo'], \PDO::PARAM_STR);
		$req->execute();

		$idUser = $req->fetch();

		return $idUser[0];
	}

	function connectAdmin() {

		$database = $this->getDb();

		$req = $database->prepare('SELECT level FROM user WHERE pseudo = :pseudo');
		$req->bindParam(':pseudo', $this->session['pseudo'], \PDO::PARAM_STR);
		$req->execute();
		$admin = $req->fetch();

		return $admin[0];

	}
}

