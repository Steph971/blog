<?php
require('UserController.php');
require('PostController.php');
require('CommentController.php');

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


else if ($page === 'connected') {						//

	$_SESSION['pseudo'] = $_POST['pseudo'];
	$_SESSION['password'] = $_POST['password'];

	$userController = new UserController();
	$userController->connected();
	$userController->connectAdmin();
}

else if ($page === 'moderation') {

	$commentController = new CommentController();
	$commentController->getCommentsValid();

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

else if ($page === 'deletePost') {

	$_SESSION['id'] = $_GET['id'];
	$postController = new PostController();
	$postController->deletePost();

}

else if ($page === 'deconnexion') {
	
	$userController = new UserController();
	$userController->deconnexion();
	
}

else if ($page === 'listComments') {

	$_SESSION['id'] = $_GET['id'];

	$commentController = new CommentController();
	$commentController->listComments();

}

else if ($page === 'addComment') {

	$_SESSION['message'] = $_POST['message'];


	$commentController = new CommentController();
	$commentController->addComment();
	$postController = new PostController();
	$postController->getPost();	
}

else if ($page === 'getPost') {

	$_SESSION['id_post'] = $_GET['id'];
	
	$postController = new PostController();
	$postController->getPost();
	
}

else if ($page === 'getCommentsValid') {

	

	$commentController = new CommentController();
	$commentController->getCommentsValid();


}





