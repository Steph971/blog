<?php
session_start();
require('../model/UserRepository.php');

class UserController {
	
	function listAll() {
		
		$userRepo = new UserRepository();
		$users = $userRepo->getUsers();
		
		require('../view/affichageAccueil.php');
		
	}
	
	function addUser() {
		
		$userRepo = new UserRepository();
		$userRepo->addUser();
		
		$users = $userRepo->getUsers();
		
		require('../view/affichageAccueil.php');
		
	}
	
	function subscribe() {
		
		
		require('../view/subscribe.php');
		
	}

	function deleteUser()								//
	{													//
		$userRepo = new UserRepository();				//
		$userRepo->deleteUser();
								//
														//
		$users = $userRepo->getUsers();					//
														//
		require('../view/affichageAccueil.php'); 					//
	}

	function editUser()
	{
		$userRepo = new UserRepository();
		$user = $userRepo->getUserById();
		require('../view/editUser.php');
	}
	
	function updateUser()
	{
		$userRepo = new UserRepository();
		$userRepo->updateUser();
		$users = $userRepo->getUsers();
		require('../view/affichageAccueil.php');
	}


	function connected()
	{
		$userRepo = new UserRepository();
		$user = $userRepo->connectUser();

		if($user === "1"){

			$idUser = $userRepo->getConnectUser();
			$_SESSION['idUser'] = $idUser;

			require ('../view/connected.php');
		}

		else {
			require ('../view/connectUser.php');
		}
	}

	function deconnexion()
	{

		unset($_SESSION['pseudo']);
		unset($_SESSION['password']);

		require('../view/connectUser.php');
		
	}

}
