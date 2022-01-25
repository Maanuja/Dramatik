<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class homepageController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function home(): Response
    {
        return $this->render('homepage.html.twig');
    }

    /**
     * @Route("/apropos")
     */
    public function apropos(): Response
    {
        return $this->render('apropos.html.twig');
    }

    /**
     * @Route("/login")
     */
    public function login(): Response
    {
        return $this->render('account/session.html.twig');
    }
    /**
     * @Route("/signup")
     */
    public function signup(): Response
    {
        return $this->render('account/session.html.twig');
    }
    /**
     * @Route("/account")
     */
    public function account(): Response
    {
        return $this->render('account/account.html.twig');
    }
    /**
     * @Route("/search")
     */
    public function search(): Response
    {
        return $this->render('search.html.twig');
    }

    /**
    * @Route("hello/{firstname<[A-Z a-z]+>}/{lastname<[A-Z a-z]+>}")
    */
    public function hello(string $lastname, string $firstname): Response
    {
        return new Response(sprintf('coucou %s %s', $firstname, $lastname));
    }
}