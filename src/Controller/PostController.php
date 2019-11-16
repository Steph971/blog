<?php
namespace App\Controller;

use \App\Model\PostRepository;
use \App\Model\CommentRepository;

/**
 * Class PostController
 * @package App\Controller
 */
class PostController extends Controller 
{
    /**
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function listPosts() 
    {
		$postRepo = new PostRepository();
		$posts = $postRepo->getLastPosts(); // get articles in descending order
		
		return $this->render('home.twig', ['posts' => $posts, 'session' => $this->session]);		
	}

    /**
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function showAllPosts() 
    {	
		$postRepo = new PostRepository();
		$posts = $postRepo->getAllPosts(); // get all articles
		
		return $this->render('listeArticles.twig', ['posts' => $posts, 'session' => $this->session]);
	}

    /**
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function showPost() 
    {
		$postRepo = new PostRepository();
		$post = $postRepo->getPost(); // get article from id
		$commentRepo = new CommentRepository();
		$comments = $commentRepo->getCommentsByArticle(); // get the comments link to the users
		return $this->render('afficheArticle.twig', ['post' => $post, 'comments' => $comments, 'session' => $this->session]);
	}

    /**
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function showAddPost() 
    {
		$postRepo = new PostRepository();
		$postRepo->addPost(); // add article
		$posts = $postRepo->getLastPosts();
		
		return $this->render('home.twig', ['posts' => $posts, 'session' => $this->session]);	
	}

    /**
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function showSelectPost() 
    {
		$postRepo = new PostRepository();
		$article = $postRepo->selectPost(); // get articles from id
		return $this->render('selectPost.twig', ['article' => $article, 'session' => $this->session]);
	}

    /**
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function showUpdatePost() 
    {
		$postRepo = new PostRepository();
		$postRepo->updatePost(); // update article from id
		$posts = $postRepo->getLastPosts(); 
		return $this->render('home.twig', ['posts' => $posts, 'session' => $this->session]);
	}

    /**
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function showDeletePost() 
    {
		$postRepo = new PostRepository();
		$postRepo->deletePost(); // delete article from id
		$posts = $postRepo->getLastPosts();
		return $this->render('home.twig', ['posts' => $posts, 'session' => $this->session]);
	}
}
