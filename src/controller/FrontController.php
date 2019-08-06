<?php

namespace App\Controller;
require('../vendor/autoload.php');

use Twig\Environment;
use Twig\Extension\DebugExtension;
use Twig\Loader\FilesystemLoader;

class FrontController extends Controller {

	public function run(){

			
		
		if (isset($_GET['page']) && !empty($_GET['page'])) {
	
			$page = $_GET['page'];
	
		} else {
	
			$page = 'home';
	
		}

		switch ($page)	{

			case "home" :
				$postController = new PostController();
				$postController->listPosts();
				break;
	
			case "listUsers" : 
				$userController = new UserController($twig);
				$userController->listAllUsers();
				break;

	
			case "addUser" :
				$_SESSION['pseudo'] = $_POST['pseudo'];
				$_SESSION['password'] = $_POST['password'];	
				$userController = new UserController($twig);
				$userController->showAddUser();
				break;
	
			case "subscribe" : 
				$userController = new UserController($twig);
				$userController->subscribe();
				break;

			case "delete" :					
				$_SESSION['id'] = $_GET['id'];											
				$userController = new UserController($twig);		
				$userController->showDeleteUser();	
				break;		

			case "editUser" : 
				$_SESSION['id'] = $_GET['id'];
				$userController = new UserController($twig);
				$userController->editUser();
				break;		

			case "updateUser" :
				$_SESSION['pseudo'] = $_POST['pseudo'];
				$_SESSION['password'] = $_POST['password'];	
				$userController = new UserController($twig);
				$userController->showUpdateUser();
				break;

			case "connectUser" : 
				$userController = new UserController();
				$userController->showConnectUser();
				break;

			case "connected" :	
				$this->session['pseudo'] = $this->post['pseudo'];
				$this->session['password'] = $this->post['password'];
				$userController = new UserController();
				$userController->showConnectAdmin();
				$userController->connected();	
				break;

			case "addArticles" :						
				$userController = new UserController($twig);
				$userController->showConnectAdmin();
				$userController->addArticles();	
				break;

			case "moderation" :
				if(isset($_SESSION['pseudo']) && isset($_SESSION['password']) && isset($_SESSION['level'])) {
					if($_SESSION['level'] == "2" ){
						$commentController = new CommentController($twig);
						$commentController->showCommentsValid();
					}
		 			else {
						echo "Acces refusé";
					}
				}
				//else {
					//echo "Acces refusé";
				//}
				break;

			case "listeArticles" : 
				$postController = new PostController($twig);
				$postController->showAllPosts();
				break;

			case "addPost" : 
				$_SESSION['title'] = $_POST['title'];
				$_SESSION['content'] = $_POST['content'];
				$postController = new PostController($twig);
				$postController->showAddPost();
				break;	

			case "selectPost" : 
				$_SESSION['id'] = $_GET['id'];
				$postController = new PostController($twig);
				$postController->showSelectPost();
				break;

			case "updatePost" : 
				$_SESSION['title'] = $_POST['title'];
				$_SESSION['content'] = $_POST['content'];
				$postController = new PostController($twig);
				$postController->showUpdatePost();
				break;

			case "deletePost" : 
				$_SESSION['id'] = $_GET['id'];
				$postController = new PostController($twig);
				$postController->showDeletePost();
				break;

			case "deconnexion" :
				$userController = new UserController($twig);
				$userController->deconnexion();
				break;

			//case "listComments" : 
				//$_SESSION['id'] = $_GET['id'];
				//$commentController = new CommentController();
				//$commentController->listComments();
				//break;

			case "addComment" : 
				$_SESSION['message'] = $_POST['message'];
				$commentController = new CommentController($twig);
				$commentController->showAddComment();
				$postController = new PostController($twig);
				$postController->showPost();	
				break;

			case "getPost" : 
				$_SESSION['id_post'] = $_GET['id'];
				$postController = new PostController();
				$postController->showPost();
				break;

			case "getCommentsValid" :
				$commentController = new CommentController($twig);
				$commentController->showCommentsValid();
				break;

			case "validComment" : 
				$_SESSION['id'] = $_GET['id'];
				$commentController = new CommentController($twig);
				$commentController->showValidComment();
				break;

			case "suppComment" : 
				$_SESSION['id'] = $_GET['id'];
				$commentController = new CommentController($twig);
				$commentController->showSuppComment();
				break;	

			case "flagComment" : 
				$_SESSION['id'] = $_GET['id'];
				$commentController = new CommentController($twig);
				$commentController->showFlagComment();
				break;
		}
	}	
}




