<?php
require('UserController.php');
require('PostController.php');

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

	$userController = new UserController();
	$userController->connectUser();
}

else if ($page === 'connected') {

	$_SESSION['pseudo'] = $_POST['pseudo'];
	$_SESSION['password'] = $_POST['password'];

	$userController = new UserController();
	$userController->connected();
}

else if ($page === 'listPosts') {
	
	$postController = new PostController();
	$postController->listPosts();

}

else if ($page === 'addPost') {

	$_SESSION['title'] = $_POST['title'];
	$_SESSION['content'] = $_POST['content'];

	
	$postController = new PostController();
	$postController->addPost();

}

else if ($page === 'selectPost') {

	$_SESSION['id'] = $_GET['id'];
	$postController = new PostController();
	$postController->selectPost();
}

else if ($page === 'updatePost') {

	$_SESSION['title'] = $_POST['title'];
	$_SESSION['content'] = $_POST['content'];
	$postController = new PostController();
	$postController->updatePost();
}




