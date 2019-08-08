<?php

namespace App\Controller;

use Twig\Environment;
use Twig\Extension\DebugExtension;
use Twig\Loader\FilesystemLoader;

class FrontController extends Controller {

    private function setSession()
    {
        $_SESSION = $this->session;
    }

	public function run(){

		if (isset($this->get['page']) && !empty($this->get['page'])) {
			$page = $this->get['page'];
		}

		switch ($page)	{

			case "home" :
				$postController = new PostController();
				$postController->listPosts();
				break;
	
			case "listUsers" : 
				$userController = new UserController();
				$userController->listAllUsers();
				break;

			case "addUser" :
				$this->session['pseudo'] = $this->post['pseudo'];
				$this->session['password'] = $this->post['password'];
				$userController = new UserController();
				$this->setSession();
				$userController->showAddUser();
				break;
	
			case "subscribe" : 
				$userController = new UserController();
				$userController->subscribe();
				break;

			case "delete" :					
				$this->session['id'] = $this->get['id'];
				$userController = new UserController();
				$this->setSession();
				$userController->showDeleteUser();	
				break;		

			case "editUser" : 
				$this->session['id'] = $this->get['id'];
				$userController = new UserController();
				$this->setSession();
				$userController->editUser();
				break;		

			case "updateUser" :
				$this->session['pseudo'] = $this->post['pseudo'];
				$this->session['password'] = $this->post['password'];
				$userController = new UserController();
				$this->setSession();
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
                $this->setSession();
				$userController->showConnectAdmin();
				$userController->connected();	
				break;

			case "addArticles" :						
				$userController = new UserController();
				$userController->showConnectAdmin();
				$userController->addArticles();	
				break;

			case "moderation" :
				if(isset($this->session['pseudo']) && isset($this->session['password']) && isset($this->session['level'])) {
					if($this->session['level'] == "2" ){
						$commentController = new CommentController();
						$commentController->showCommentsValid();
					}
		 			else {
						echo "Acces refusé";
					}
				}
				break;

			case "listeArticles" : 
				$postController = new PostController();
				$postController->showAllPosts();
				break;

			case "addPost" : 
				$this->session['title'] = $this->post['title'];
				$this->session['content'] = $this->post['content'];
				$postController = new PostController();
				$this->setSession();
				$postController->showAddPost();
				break;	

			case "selectPost" : 
				$this->session['id'] = $this->get['id'];
				$postController = new PostController();
				$this->setSession();
				$postController->showSelectPost();
				break;

			case "updatePost" : 
				$this->session['title'] = $this->post['title'];
				$this->session['content'] = $this->post['content'];
				$postController = new PostController();
				$this->setSession();
				$postController->showUpdatePost();
				break;

			case "deletePost" : 
				$this->session['id'] = $this->get['id'];
				$postController = new PostController();
				$this->setSession();
				$postController->showDeletePost();
				break;

			case "deconnexion" :
				$userController = new UserController();
				$userController->deconnexion();
				break;

			case "addComment" : 
				$this->session['message'] = $this->post['message'];
				$commentController = new CommentController();
				$this->setSession();
				$commentController->showAddComment();
				$postController = new PostController();
				$this->setSession();
				$postController->showPost();	
				break;

			case "getPost" : 
				$this->session['id_post'] = $this->get['id'];
				$postController = new PostController();
				$this->setSession();
				$postController->showPost();
				break;

			case "getCommentsValid" :
				$commentController = new CommentController();
				$commentController->showCommentsValid();
				break;

			case "validComment" : 
				$this->session['id'] = $this->get['id'];
				$commentController = new CommentController();
				$this->setSession();
				$commentController->showValidComment();
				break;

			case "suppComment" : 
				$this->session['id'] = $this->get['id'];
				$commentController = new CommentController();
				$this->setSession();
				$commentController->showSuppComment();
				break;	

			case "flagComment" : 
				$this->session['id'] = $this->get['id'];
				$commentController = new CommentController();
				$this->setSession();
				$commentController->showFlagComment();
				break;
		}
	}	
}




