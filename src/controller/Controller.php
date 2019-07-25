<?php

namespace App\Controller;

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

/**
 * Class Controller
 */
abstract class Controller
{
    /**
     * @var Twig_Environment
     */
    private $twig;

    /**
     * @var mixed
     */
    private $get;

    /**
     * @var mixed
     */
    private $post;

    /**
     * @var mixed
     */
    private $session;

    /**
     * Controller constructor.
     * @param Environment $twig
     */
    public function __construct(Environment $twig)
    {
        $this->twig = $twig;

        $this->get  = filter_input_array(INPUT_GET);
        $this->post = filter_input_array(INPUT_POST);

        $this->session = filter_var_array($_SESSION);
    }

    /**
     * @param $view
     * @param array $params
     * @return string
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function render($view, array $params = [])
    {
        return $this->twig->render($view, $params);
    }
}