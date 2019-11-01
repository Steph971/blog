<?php

namespace App\Model;

/**
 * Class UserRepository
 * @package App\Model
 */
class UserRepository extends Repository  
{

    /**
     * @return array
     */
    public function getUsers()
	{
		$req = $this->database->prepare('SELECT id, pseudo, password FROM user ORDER BY id DESC LIMIT 0,1');
		$req->execute(); 
		
		$users = [];
		
		while($data = $req-> fetch()) {
			
			
			$user = new User($data['id'], $data['pseudo'] , $data['password']);
			
			$users[] = $user;	
		}
		
		$req->closeCursor();

		return $users;
	}


    /**
     *
     */
    public function addUser()
	{
		$hashpass= password_hash($this->session['password'], PASSWORD_DEFAULT);
		$req = $this->database->prepare('INSERT INTO user(pseudo, password) VALUES(:pseudo, :password)'); 
		$req->bindParam(':pseudo', $this->session['pseudo'], \PDO::PARAM_STR);
		$req->bindParam(':password', $hashpass, \PDO::PARAM_STR);
		$req->execute();
	}

    /**
     *
     */
    public function deleteUser()														//
	{			
		$req = $this->database->prepare('DELETE FROM user WHERE id=:id');
		$req->bindParam(':id', $this->session['id'], \PDO::PARAM_INT);
			
		$req->execute();									//
	}

    /**
     * @return mixed
     */
    public function getUserById()
	{
		$req = $this->database->prepare('SELECT * FROM user WHERE id=:id');
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

    /**
     *
     */
    public function updateUser()
	{
		$hashpass= password_hash($this->session['password'], PASSWORD_DEFAULT);
		$req = $this->database->prepare('UPDATE user SET pseudo=:pseudo, password=:password WHERE id=:id');
		$req->bindParam(':pseudo', $this->session['pseudo'], \PDO::PARAM_STR);
		$req->bindParam(':password', $hashpass, \PDO::PARAM_STR);
		$req->bindParam(':id', $this->session['id'], \PDO::PARAM_INT);
		$req->execute();
	}

    /**
     * @return bool
     */
    public function connectUser()
	{
		$req = $this->database->prepare('SELECT * FROM user WHERE pseudo = :pseudo');
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
		} 
		else {
			return false;
		}
	}

    /**
     * @return mixed
     */
    public function getConnectUser()
	{
		$req = $this->database->prepare('SELECT id FROM user WHERE pseudo=:pseudo');
		$req->bindParam(':pseudo', $this->session['pseudo'], \PDO::PARAM_STR);
		$req->execute();

		$idUser = $req->fetch();

		return $idUser[0];
	}

    /**
     * @return mixed
     */
    public function connectAdmin()
	{
		$req = $this->database->prepare('SELECT level FROM user WHERE pseudo = :pseudo');
		$req->bindParam(':pseudo', $this->session['pseudo'], \PDO::PARAM_STR);
		$req->execute();
		$admin = $req->fetch();

		return $admin[0];

	}
}
