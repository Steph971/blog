<?php

namespace App\Controller;

use \App\Model\UserRepository;

class UserController extends Controller{

	//private function setSessionId()
    //{
        //$_SESSION['idUser'] = $this->session['idUser'];
   // }
	
	function listAllUsers() {
		
		$userRepo = new UserRepository();
		$users = $userRepo->getUsers(); // get the list of users put in the variable $users
		return $this->render('affichageAccueil.twig', ['users' => $users, 'session' => $this->session]);
		
	}
	
	function showAddUser() {
		
		$userRepo = new UserRepository();
		$userRepo->addUser();
		
		$users = $userRepo->getUsers(); // get the list of users put in the variable $users
		
		return $this->render('affichageAccueil.twig', ['users' => $users, 'session' => $this->session]);
		
	}
	
	function subscribe() {
		
		
		return $this->render('subscribe.twig');
		
	}

	function showDeleteUser()								
	{													
		$userRepo = new UserRepository();				
		$userRepo->deleteUser(); // delete by id				
		$users = $userRepo->getUsers();	 // get the list of users put in the variable $users
		unset($this->session['pseudo']); // delete session 
		unset($this->session['password']);
		return $this->render('affichageAccueil.twig', ['users' => $users, 'session' => $this->session]); // redirection to the list of users
	}

	function editUser() 
	{
		$userRepo = new UserRepository();
		$user = $userRepo->getUserById(); // get users by id 
		return $this->render('editUser.twig', ['user' => $user, 'session' => $this->session]);  // redirection to the edit page
	}
	
	function showUpdateUser()
	{
		$userRepo = new UserRepository();
		$userRepo->updateUser();  // update by id
		$users = $userRepo->getUsers(); //get the list of users put in the variable $users
		return $this->render('affichageAccueil.twig', ['users' => $users, 'session' => $this->session]); // redirection to the list of users
	}

	function showConnectUser() //afficher le formulaire de connexion
	{
		return $this->render('connectUser.twig');
	}

	function connected()
	{
		$userRepo = new UserRepository();
		$user = $userRepo->connectUser(); // check if user exists with given pseudo and password


		if($user){ // if user exists 

			$this->session['idUser'] = $userRepo->getConnectUser(); // get user id by pseudo(used to add comments and articles)
			$_SESSION['idUser'] = $this->session['idUser'];

			return $this->render('connected.twig', ['session' => $this->session]);// redirect successfully connected user
		}

		else { // if user doesn't exist
			return $this->render('connectUser.twig'); // redirect to authentication form
		}
	}

	function addArticles()
	{
		$userRepo = new UserRepository();
		$user = $userRepo->connectUser(); // check if user exists with given pseudo and password

		if($user){ // if user exists 

			$this->session['idUser'] = $userRepo->getConnectUser(); // get user id by pseudo(used to add comments and articles)
			$_SESSION['idUser'] = $this->session['idUser'];

			return $this->render('connected.twig', ['session' => $this->session]);  // redirect successfully connected user
		}

		//else { // if user doesn't exist
			//echo $this->render('connectUser.twig');// redirect to authentication form
		//}
	}

	function deconnexion()
	{
		$_SESSION['idUser'] = $this->session['idUser'];
		$this->session['pseudo']; // delete session for disconnection
		$this->session['password'];
		$this->session['idUser'];

		session_destroy();

		return $this->render('connectUser.twig'); // redirect to authentication form
		
	}

	function showConnectAdmin() {

		$userRepo = new UserRepository();
		$_SESSION['level'] = $userRepo->connectAdmin(); // get level by user

	}

}
