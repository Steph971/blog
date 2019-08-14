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
		} else {
	
			$page = 'home';
	
		}

        $postController = new PostController();
        $userController = new UserController();
        $commentController = new CommentController();

		switch ($page)	{

			case "home" :
				$postController->listPosts();
				break;
	
			case "listUsers" :
				$userController->listAllUsers();
				break;

			case "addUser" :
				$this->session['pseudo'] = $this->post['pseudo'];
				$this->session['password'] = $this->post['password'];
				$this->setSession();
				$userController->showAddUser();
				break;
	
			case "subscribe" :
				$userController->subscribe();
				break;

			case "delete" :					
				$this->session['id'] = $this->get['id'];
				$this->setSession();
				$userController->showDeleteUser();	
				break;		

			case "editUser" : 
				$this->session['id'] = $this->get['id'];
				$this->setSession();
				$userController->editUser();
				break;		

			case "updateUser" :
				$this->session['pseudo'] = $this->post['pseudo'];
				$this->session['password'] = $this->post['password'];
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
                $this->setSession();
				$userController->showConnectAdmin();
				$userController->connected();	
				break;

			case "addArticles" :
				$userController->showConnectAdmin();
				$userController->addArticles();	
				break;

			case "moderation" :
				if(isset($this->session['pseudo']) && isset($this->session['password']) && isset($this->session['level'])) {
					if($this->session['level'] == "2" ){
						$commentController->showCommentsValid();
					}
		 			else {
						echo "Acces refusé";
					}
				}
				break;

			case "listeArticles" :
				$postController->showAllPosts();
				break;

			case "addPost" : 
				$this->session['title'] = $this->post['title'];
				$this->session['content'] = $this->post['content'];
				$this->setSession();
				$postController->showAddPost();
				break;	

			case "selectPost" : 
				$this->session['id'] = $this->get['id'];
				$this->setSession();
				$postController->showSelectPost();
				break;

			case "updatePost" : 
				$this->session['title'] = $this->post['title'];
				$this->session['content'] = $this->post['content'];
				$this->setSession();
				$postController->showUpdatePost();
				break;

			case "deletePost" : 
				$this->session['id'] = $this->get['id'];
				$this->setSession();
				$postController->showDeletePost();
				break;

			case "deconnexion" :
				$userController->deconnexion();
				break;

			case "addComment" : 
				$this->session['message'] = $this->post['message'];
				$this->setSession();
				$commentController->showAddComment();
				$this->setSession();
				$postController->showPost();	
				break;

			case "getPost" : 
				$this->session['id_post'] = $this->get['id'];
				$this->setSession();
				$postController->showPost();
				break;

			case "getCommentsValid" :
				$commentController->showCommentsValid();
				break;

			case "validComment" : 
				$this->session['id'] = $this->get['id'];
				$this->setSession();
				$commentController->showValidComment();
				break;

			case "suppComment" : 
				$this->session['id'] = $this->get['id'];
				$this->setSession();
				$commentController->showSuppComment();
				break;	

			case "flagComment" : 
				$this->session['id'] = $this->get['id'];
				$this->setSession();
				$commentController->showFlagComment();
				break;
		}
	}	
}




