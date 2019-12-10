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
    /**
     *
     */
    public function showAddComment() 
    {	
		$commentRepo = new CommentRepository();
		$commentRepo->addComment();	
	}

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
        $flags = $commentRepo->getCommentsFlag();

        if(isset($this->session['pseudo']) && isset($this->session['password']) && isset($this->session['level'])) {
                    if($this->session['level'] == "2" ){

		return $this->render('moderation.twig', ['coms' => $coms, 'flags' => $flags, 'session' => $this->session]);

            }
                    else {
                        echo "Acces refusé";
                    }
                }
	}

    public function showCommentsFlag() 
    {
        $commentRepo = new CommentRepository();
        $flags = $commentRepo->getCommentsFlag(); // get comments to validated link to the users

        return $this->render('moderation.twig', ['flags' => $flags, 'session' => $this->session]);
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
        $commentRepo->validFlagComment(); // to validate the comment
        $flags = $commentRepo->getCommentsFlag();

		return $this->render('moderation.twig', ['coms' => $coms, 'flags' => $flags, 'session' => $this->session]);
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
        $flags = $commentRepo->getCommentsFlag();

		return $this->render('moderation.twig', ['coms' => $coms, 'flags' => $flags, 'session' => $this->session]);
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

    public function showValidFlagComment()
    {
        $commentRepo = new CommentRepository();
        $commentRepo->validFlagComment(); // to validate the comment
        $flags = $commentRepo->getCommentsFlag(); //get comments to validated 
        $commentRepo->validComment(); // to validate the comment
        $coms = $commentRepo->getCommentsValid();


        return $this->render('moderation.twig', ['flags' => $flags, 'coms' => $coms, 'session' => $this->session]);
    }
}
