<?php

namespace App\Controller;
session_start();

use App\Controller;
use App\UserRepository;
//require('../src/model/UserRepository.php');
//require('Controller.php');

class UserController extends Controller{
	
	function listAll() {
		
		$userRepo = new UserRepository();
		$users = $userRepo->getUsers(); // get the list of users put in the variable $users
		echo $this->render('affichageAccueil.twig', ['users' => $users, 'session' => $_SESSION]);
		
	}
	
	function addUser() {
		
		$userRepo = new UserRepository();
		$userRepo->addUser();
		
		$users = $userRepo->getUsers(); // get the list of users put in the variable $users
		
		echo $this->render('affichageAccueil.twig', ['users' => $users, 'session' => $_SESSION]);
		
	}
	
	function subscribe() {
		
		
		echo $this->render('subscribe.twig');
		
	}

	function deleteUser()								
	{													
		$userRepo = new UserRepository();				
		$userRepo->deleteUser(); // delete by id				
		$users = $userRepo->getUsers();	 // get the list of users put in the variable $users
		unset($_SESSION['pseudo']); // delete session 
		unset($_SESSION['password']);
		echo $this->render('affichageAccueil.twig', ['users' => $users, 'session' => $_SESSION]); // redirection to the list of users
	}

	function editUser() 
	{
		$userRepo = new UserRepository();
		$user = $userRepo->getUserById(); // get users by id 
		echo $this->render('editUser.twig', ['user' => $user, 'session' => $_SESSION]);  // redirection to the edit page
	}
	
	function updateUser()
	{
		$userRepo = new UserRepository();
		$userRepo->updateUser();  // update by id
		$users = $userRepo->getUsers(); //get the list of users put in the variable $users
		echo $this->render('affichageAccueil.twig', ['users' => $users, 'session' => $_SESSION]); // redirection to the list of users
	}

	function connectUser() //afficher le formulaire de connexion
	{
		echo $this->render('connectUser.twig');
	}

	function connected()
	{
		$userRepo = new UserRepository();
		$user = $userRepo->connectUser(); // check if user exists with given pseudo and password


		if($user){ // if user exists 

			$idUser = $userRepo->getConnectUser(); // get user id by pseudo(used to add comments and articles)
			$_SESSION['idUser'] = $idUser;

			echo $this->render('connected.twig', ['session' => $_SESSION]);// redirect successfully connected user
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

			$idUser = $userRepo->getConnectUser(); // get user id by pseudo(used to add comments and articles)
			$_SESSION['idUser'] = $idUser;

			echo $this->render('connected.twig', ['session' => $_SESSION]);  // redirect successfully connected user
		}

		else { // if user doesn't exist
			echo $this->render('connectUser.twig');// redirect to authentication form
		}
	}

	function deconnexion()
	{

		unset($_SESSION['pseudo']); // delete session for disconnection
		unset($_SESSION['password']);
		unset($_SESSION['idUser']);

		echo $this->render('connectUser.twig'); // redirect to authentication form
		
	}

	function connectAdmin() {

		$userRepo = new UserRepository();
		$_SESSION['level'] = $userRepo->connectAdmin(); // get level by user

	}

}
