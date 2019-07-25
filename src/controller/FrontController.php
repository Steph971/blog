<?php

namespace App\Controller;
//require('../src/controller/UserController.php');
//require('../src/controller/PostController.php');
//require('../src/controller/CommentController.php');
require('../vendor/autoload.php');

use App\model\PostRepository;
use Twig\Environment;
use Twig\Extension\DebugExtension;
use Twig\Loader\FilesystemLoader;

class FrontController {

	public function run(){

		$loader = new \Twig\Loader\FilesystemLoader( '../src/view/layout');
        $twig = new \Twig\Environment($loader, [
            //'cache' => false,
            'debug' => false
        ]);		
		
		if (isset($_GET['page']) && !empty($_GET['page'])) {
	
			$page = $_GET['page'];
	
		} else {
	
			$page = 'home';
	
		}

		switch ($page)	{

			case "home" :
				$postController = new PostController($twig);
				$postController->listPosts();
				break;
	
			case "listUsers" : 
				$userController = new UserController();
				$userController->listAll();
				break;

	
			case "addUser" :
				$_SESSION['pseudo'] = $_POST['pseudo'];
				$_SESSION['password'] = $_POST['password'];	
				$userController = new UserController();
				$userController->addUser();
				break;
	
			case "subscribe" : 
				$userController = new UserController();
				$userController->subscribe();
				break;

			case "delete" :					
				$_SESSION['id'] = $_GET['id'];											
				$userController = new UserController();		
				$userController->deleteUser();	
				break;		

			case "editUser" : 
				$_SESSION['id'] = $_GET['id'];
				$userController = new UserController();
				$userController->editUser();
				break;		

			case "updateUser" :
				$_SESSION['pseudo'] = $_POST['pseudo'];
				$_SESSION['password'] = $_POST['password'];	
				$userController = new UserController();
				$userController->updateUser();
				break;

			case "connectUser" : 
				$userController = new UserController($twig);
				$userController->connectUser();
				break;

			case "connected" :	
				$_SESSION['pseudo'] = $_POST['pseudo'];
				$_SESSION['password'] = $_POST['password'];
				$userController = new UserController($twig);
				$userController->connectAdmin();
				$userController->connected();	
				break;

			case "addArticles" :						
				$userController = new UserController();
				$userController->connectAdmin();
				$userController->addArticles();	
				break;

			case "moderation" :
				if(isset($_SESSION['pseudo']) && isset($_SESSION['password']) && isset($_SESSION['level'])) {
					if($_SESSION['level'] == "2" ){
						$commentController = new CommentController();
						$commentController->getCommentsValid();
					}
		 			else {
						echo "Acces refusé";
					}
				}
				else {
					echo "Acces refusé";
				}
				break;

			case "listeArticles" : 
				$postController = new PostController();
				$postController->getAllPosts();
				break;

			case "addPost" : 
				$_SESSION['title'] = $_POST['title'];
				$_SESSION['content'] = $_POST['content'];
				$postController = new PostController();
				$postController->addPost();
				break;	

			case "selectPost" : 
				$_SESSION['id'] = $_GET['id'];
				$postController = new PostController();
				$postController->selectPost();
				break;

			case "updatePost" : 
				$_SESSION['title'] = $_POST['title'];
				$_SESSION['content'] = $_POST['content'];
				$postController = new PostController();
				$postController->updatePost();
				break;

			case "deletePost" : 
				$_SESSION['id'] = $_GET['id'];
				$postController = new PostController();
				$postController->deletePost();
				break;

			case "deconnexion" :
				$userController = new UserController();
				$userController->deconnexion();
				break;

			case "listComments" : 
				$_SESSION['id'] = $_GET['id'];
				$commentController = new CommentController();
				$commentController->listComments();
				break;

			case "addComment" : 
				$_SESSION['message'] = $_POST['message'];
				$commentController = new CommentController();
				$commentController->addComment();
				$postController = new PostController();
				$postController->getPost();	
				break;

			case "getPost" : 
				$_SESSION['id_post'] = $_GET['id'];
				$postController = new PostController();
				$postController->getPost();
				break;

			case "getCommentsValid" :
				$commentController = new CommentController();
				$commentController->getCommentsValid();
				break;

			case "validComment" : 
				$_SESSION['id'] = $_GET['id'];
				$commentController = new CommentController();
				$commentController->validComment();
				break;

			case "suppComment" : 
				$_SESSION['id'] = $_GET['id'];
				$commentController = new CommentController();
				$commentController->suppComment();
				break;	

			case "flagComment" : 
				$_SESSION['id'] = $_GET['id'];
				$commentController = new CommentController();
				$commentController->flagComment();
				break;
		}
	}	
}




