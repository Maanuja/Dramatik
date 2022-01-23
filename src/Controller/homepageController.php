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
     * @Route("/contact")
     */
    public function contact(): Response
    {
        return new Response( 'PageContact');
    }

    /**
    * @Route("hello/{firstname<[A-Z a-z]+>}/{lastname<[A-Z a-z]+>}")
    */
    public function hello(string $lastname, string $firstname): Response
    {
        return new Response(sprintf('coucou %s %s', $firstname, $lastname));
    }
}