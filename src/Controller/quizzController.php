<?php

namespace App\Controller;

use Psr\Container\ContainerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class quizzController extends AbstractController
{
    /**
     * @Route("/qcre")
     */
    public function quizzcreate(): Response
    {
        return $this->render('quizzCreate/quizzCreate.html.twig');
    }

    /**
     * @Route("/qtcrea")
     */
    public function questionc(): Response
    {
        return $this->render('quizzCreate/questionCreate.html.twig');
    }

    /**
     * @Route("/question")
     */
    public function question(): Response{
        return $this->render('quizzPlay/quizzPlay.html.twig');
    }

    /**
     * @Route("/quizz")
     */
    public function quizz(){
        return $this->render('quizzPlay/quizzStart.html.twig');
    }
}