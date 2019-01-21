<?php
require('UserController.php');

if (isset($_GET['page']) && !empty($_GET['page'])) {
	
	$page = $_GET['page'];
	
} else {
	
	$page = 'home';
	
}

if ($page === 'home') {
	
	require '../view/home.php';
	
} else if ($page === 'listUsers') {
	
	$userController = new UserController();
	$userController->listAll();
	
} else if ($page === 'addUser') {
	
	$_SESSION['pseudo'] = $_POST['pseudo'];
	$_SESSION['password'] = $_POST['password'];

	
	$userController = new UserController();
	$userController->addUser();
	
} else if ($page === 'subscribe') {
	
	$userController = new UserController();
	$userController->subscribe();
	
}

else if ($page === 'delete') {					//
	
	$_SESSION['id'] = $_GET['id'];											//
	$userController = new UserController();		//
	$userController->deleteUser();	
			//
}

else if ($page === 'editUser') {
	$_SESSION['id'] = $_GET['id'];
	$userController = new UserController();
	$userController->editUser();
}

else if ($page === 'updateUser') {
	
	$_SESSION['pseudo'] = $_POST['pseudo'];
	$_SESSION['password'] = $_POST['password'];

	
	$userController = new UserController();
	$userController->updateUser();
}

else if ($page === 'connectUser') {
	
	$_SESSION['id'] = $_SESSION['id'];
	$_SESSION['pseudo'] = $_SESSION['pseudo'];
	$_SESSION['password'] = $_SESSION['password'];

	$userController = new UserController();
	$userController->connectUser();

		if(isset($_SESSION['id']) AND $_SESSION['pseudo'] === TRUE) {
			echo 'bonjour' . $_SESSION['pseudo'];
			require('../view/connected.php');
		}


}
