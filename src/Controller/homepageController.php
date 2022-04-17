<?php

namespace App\Controller;

use App\Entity\Quizz;
use App\Entity\User;
use App\Form\UpdateUserFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class homepageController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function home(): Response
    {
        return $this->render('homepage.html.twig');
    }
}