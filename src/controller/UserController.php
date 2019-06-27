<?php
session_start();
require('../src/model/UserRepository.php');

class UserController {
	
	function listAll() {
		
		$userRepo = new UserRepository();
		$users = $userRepo->getUsers(); // get the list of users put in the variable $users
		require('../src/view/affichageAccueil.php');
		
	}
	
	function addUser() {
		
		$userRepo = new UserRepository();
		$userRepo->addUser();
		
		$users = $userRepo->getUsers(); // get the list of users put in the variable $users
		
		require('../src/view/affichageAccueil.php');
		
	}
	
	function subscribe() {
		
		
		require('../src/view/subscribe.php');
		
	}

	function deleteUser()								
	{													
		$userRepo = new UserRepository();				
		$userRepo->deleteUser(); // delete by id				
		$users = $userRepo->getUsers();	 // get the list of users put in the variable $users
		unset($_SESSION['pseudo']); // delete session 
		unset($_SESSION['password']);
		require('../src/view/affichageAccueil.php'); // redirection to the list of users
	}

	function editUser() 
	{
		$userRepo = new UserRepository();
		$user = $userRepo->getUserById(); // get users by id 
		require('../src/view/editUser.php'); // redirection to the edit page
	}
	
	function updateUser()
	{
		$userRepo = new UserRepository();
		$userRepo->updateUser();  // update by id
		$users = $userRepo->getUsers(); //get the list of users put in the variable $users
		require('../src/view/affichageAccueil.php'); // redirection to the list of users
	}

	function connectUser() //afficher le formulaire de connexion
	{
		require('../src/view/connectUser.php');
	}

	function connected()
	{
		$userRepo = new UserRepository();
		$user = $userRepo->connectUser(); // check if user exists with given pseudo and password


		if($user){ // if user exists 

			$idUser = $userRepo->getConnectUser(); // get user id by pseudo(used to add comments and articles)
			$_SESSION['idUser'] = $idUser;

			require ('../src/view/connected.php'); // redirect successfully connected user
		}

		else { // if user doesn't exist
			require ('../src/view/connectUser.php'); // redirect to authentication form
		}
	}

	function addArticles()
	{
		$userRepo = new UserRepository();
		$user = $userRepo->connectUser(); // check if user exists with given pseudo and password

		if($user){ // if user exists 

			$idUser = $userRepo->getConnectUser(); // get user id by pseudo(used to add comments and articles)
			$_SESSION['idUser'] = $idUser;

			require ('../src/view/addArticles.php'); // redirect successfully connected user
		}

		else { // if user doesn't exist
			require ('../src/view/connectUser.php'); // redirect to authentication form
		}
	}

	function deconnexion()
	{

		unset($_SESSION['pseudo']); // delete session for disconnection
		unset($_SESSION['password']);
		unset($_SESSION['idUser']);

		require('../src/view/connectUser.php'); // redirect to authentication form
		
	}

	function connectAdmin() {

		$userRepo = new UserRepository();
		$_SESSION['level'] = $userRepo->connectAdmin(); // get level by user

	}

}
