<?php

namespace App\Controller;

use \App\Model\UserRepository;

class UserController extends Controller{
	
	function listAllUsers() {
		
		$userRepo = new UserRepository();
		$users = $userRepo->getUsers(); // get the list of users put in the variable $users
		echo $this->render('affichageAccueil.twig', ['users' => $users, 'session' => $this->session]);
		
	}
	
	function showAddUser() {
		
		$userRepo = new UserRepository();
		$userRepo->addUser();
		
		$users = $userRepo->getUsers(); // get the list of users put in the variable $users
		
		echo $this->render('affichageAccueil.twig', ['users' => $users, 'session' => $this->session]);
		
	}
	
	function subscribe() {
		
		
		echo $this->render('subscribe.twig');
		
	}

	function showDeleteUser()								
	{													
		$userRepo = new UserRepository();				
		$userRepo->deleteUser(); // delete by id				
		$users = $userRepo->getUsers();	 // get the list of users put in the variable $users
		unset($this->session['pseudo']); // delete session 
		unset($this->session['password']);
		echo $this->render('affichageAccueil.twig', ['users' => $users, 'session' => $this->session]); // redirection to the list of users
	}

	function editUser() 
	{
		$userRepo = new UserRepository();
		$user = $userRepo->getUserById(); // get users by id 
		echo $this->render('editUser.twig', ['user' => $user, 'session' => $this->session]);  // redirection to the edit page
	}
	
	function showUpdateUser()
	{
		$userRepo = new UserRepository();
		$userRepo->updateUser();  // update by id
		$users = $userRepo->getUsers(); //get the list of users put in the variable $users
		echo $this->render('affichageAccueil.twig', ['users' => $users, 'session' => $this->session]); // redirection to the list of users
	}

	function showConnectUser() //afficher le formulaire de connexion
	{
		echo $this->render('connectUser.twig');
	}

	function connected()
	{
		$userRepo = new UserRepository();
		$user = $userRepo->connectUser(); // check if user exists with given pseudo and password


		if($user){ // if user exists 

			$this->session['idUser'] = $userRepo->getConnectUser(); // get user id by pseudo(used to add comments and articles)
			$_SESSION['idUser'] = $this->session['idUser'];

			echo $this->render('connected.twig', ['session' => $this->session]);// redirect successfully connected user
		}

		else { // if user doesn't exist
			echo $this->render('connectUser.twig'); // redirect to authentication form
		}
	}

	function addArticles()
	{
		$userRepo = new UserRepository();
		$user = $userRepo->connectUser(); // check if user exists with given pseudo and password

		if($user){ // if user exists 

			$this->session['idUser'] = $userRepo->getConnectUser(); // get user id by pseudo(used to add comments and articles)
			$_SESSION['idUser'] = $this->session['idUser'];

			echo $this->render('connected.twig', ['session' => $this->session]);  // redirect successfully connected user
		}

		//else { // if user doesn't exist
			//echo $this->render('connectUser.twig');// redirect to authentication form
		//}
	}

	function deconnexion()
	{

		unset($this->session['pseudo']); // delete session for disconnection
		unset($this->session['password']);
		unset($_SESSION['idUser']);

		echo $this->render('connectUser.twig'); // redirect to authentication form
		
	}

	function showConnectAdmin() {

		$userRepo = new UserRepository();
		$_SESSION['level'] = $userRepo->connectAdmin(); // get level by user

	}

}
