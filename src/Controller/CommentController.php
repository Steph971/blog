<?php

namespace App\Controller;

use \App\Model\CommentRepository;
use \App\Model\PostRepository;

/**
 * Class CommentController
 * @package App\Controller
 */
class CommentController extends Controller 
{
	
	
	//function getComments() {

		//$commentRepo = new CommentRepository();
		//$comment = $commentRepo->getComments(); // get validated comments (validate = 1)

		//require('../src/view/afficheArticle.php');
	//}

    /**
     *
     */
    public function showAddComment() 
    {
		
		$commentRepo = new CommentRepository();
		$commentRepo->addComment();	
	}

	//function getCommentsByArticle(){


		//$commentRepo = new CommentRepository();
		//$comments = $commentRepo->getCommentsByArticle(); // get the comments link to the users and articles

		//echo $this->render('afficheArticle.twig', ['comments' => $comments, 'session' => $_SESSION]);
	//}

    /**
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function showCommentsValid() 
    {

		$commentRepo = new CommentRepository();
		$coms = $commentRepo->getCommentsValid(); // get comments to validated link to the users

		return $this->render('moderation.twig', ['coms' => $coms, 'session' => $this->session]);
	}

    /**
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function showValidComment()
    {

		$commentRepo = new CommentRepository();
		$commentRepo->validComment(); // to validate the comment
		$coms = $commentRepo->getCommentsValid(); //get comments to validated 

		return $this->render('moderation.twig', ['coms' => $coms, 'session' => $this->session]);
	}

    /**
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function showSuppComment() 
    {

		$commentRepo = new CommentRepository();
		$commentRepo->suppComment(); // delete comment from id
		$coms = $commentRepo->getCommentsValid();

		return $this->render('moderation.twig', ['coms' => $coms, 'session' => $this->session]);
	}

    /**
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function showFlagComment() 
    {

		$commentRepo = new CommentRepository();
		$commentRepo->flagComment(); // put the comment pending validation
		$comments = $commentRepo->getCommentsByArticle(); // get the comments link to the users and articles
		$postRepo = new PostRepository();
		$post = $postRepo->getPost(); // get article from id

		return $this->render('afficheArticle.twig', ['post' => $post, 'comments' => $comments, 'session' => $this->session]);
	}
}
