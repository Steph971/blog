<?php

namespace App\Controller;



use Twig\Environment;
use Twig\Extension\DebugExtension;
use Twig\Loader\FilesystemLoader;

/**
 * Class FrontController
 * @package App\Controller
 */
class FrontController extends Controller 
{

    /**
     *
     */
    private function setSession()
    {
        $_SESSION = $this->session;
    }

    /**
     *
     */
    public function run()
    {

		if (isset($this->get['page']) && !empty($this->get['page'])) {
			$page = $this->get['page'];
		} 
		else {
			$page = 'home';
		}

        $postController = new PostController();
        $userController = new UserController();
        $commentController = new CommentController();

		switch ($page)	{

			case "home" :
				$response = $postController->listPosts();
				break;
	
			case "listUsers" :
				$response = $userController->listAllUsers();
				break;

			case "addUser" :
				$this->session['pseudo'] = $this->post['pseudo'];
				$this->session['password'] = $this->post['password'];
				$this->setSession();
				$response = $userController->showAddUser();
				break;
	
			case "subscribe" :
				$response = $userController->subscribe();
				break;

			case "userAccount" : 
				//$this->session['id'] = $this->get['id'];
				$this->setSession();
				$response = $userController->getUserAccount();
				break;

			case "delete" :					
				$this->session['id'] = $this->get['id'];
				$this->setSession();
				$response = $userController->showDeleteUser();	
				break;		

			case "editUser" : 
				$this->session['id'] = $this->get['id'];
				$this->setSession();
				$response = $userController->editUser();
				break;		

			case "updateUser" :
				$this->session['pseudo'] = $this->post['pseudo'];
				$this->session['password'] = $this->post['password'];
				$this->setSession();
				$response = $userController->showUpdateUser();
				break;

			case "connectUser" : 
				$response = $userController->showConnectUser();
				break;

			case "connected" :	
				$this->session['pseudo'] = $this->post['pseudo'];
				$this->session['password'] = $this->post['password'];
                $this->setSession();
				$userController->showConnectAdmin();
				$response = $userController->connected();	
				break;

			case "addArticles" :
				$userController->showConnectAdmin();
				$response = $userController->addArticles();	
				break;

			case "moderation" :
	
						//$response = $commentController->showCommentsFlag();
						$response = $commentController->showCommentsValid();
					
						
					
				
				break;

			case "listeArticles" :
				$response = $postController->showAllPosts();
				break;

			case "addPost" : 
				$this->session['title'] = $this->post['title'];
				$this->session['content'] = $this->post['content'];
				$this->setSession();
				$response = $postController->showAddPost();
				break;

			case "selectPost" : 
				$this->session['id'] = $this->get['id'];
				$this->setSession();
				$response = $postController->showSelectPost();
				break;

			case "updatePost" : 
				$this->session['title'] = $this->post['title'];
				$this->session['content'] = $this->post['content'];
				$this->setSession();
				$response = $postController->showUpdatePost();
				break;

			case "deletePost" : 
				$this->session['id'] = $this->get['id'];
				$this->setSession();
				$response = $postController->showDeletePost();
				break;

			case "deconnexion" :
				$response = $userController->deconnexion();
				break;

			case "addComment" : 
				$this->session['message'] = $this->post['message'];
				$this->setSession();
				$commentController->showAddComment();
				$this->setSession();
				$response = $postController->showPost();	
				break;

			case "getPost" : 
				$this->session['id_post'] = $this->get['id'];
				$this->setSession();
				$response = $postController->showPost();
				break;

			//case "getCommentsValid" :
				//$response = $commentController->showCommentsValid();
			//	break;

			//case "getCommentsFLag" :
				//$response = $commentController->showCommentsFlag();
				//break;



			case "validComment" : 
				$this->session['id'] = $this->get['id'];
				$this->setSession();
				$response = $commentController->showValidComment();
				break;

			case "suppComment" : 
				$this->session['id'] = $this->get['id'];
				$this->setSession();
				$response = $commentController->showSuppComment();
				break;	

			case "flagComment" : 
				$this->session['id'] = $this->get['id'];
				$this->setSession();
				$response = $commentController->showFlagComment();
				break;

			case "validFlagComment" : 
				$this->session['id'] = $this->get['id'];
				$this->setSession();
				$response = $commentController->showValidFlagComment();
				break;
		}

		echo filter_var($response);
	}	
}
