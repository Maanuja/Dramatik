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
        return $this->render('homepage/homepage.html.twig');
    }

    /**
     * @Route("/apropos")
     */
    public function apropos(): Response
    {
        return $this->render('apropos.html.twig');
    }

    /**
    * @Route("hello/{firstname<[A-Z a-z]+>}/{lastname<[A-Z a-z]+>}")
    */
    public function hello(string $lastname, string $firstname): Response
    {
        return new Response(sprintf('coucou %s %s', $firstname, $lastname));
    }
}