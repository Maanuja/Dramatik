<?php

namespace App\Controller;

use App\Entity\Quizz;
use App\Entity\User;
use App\Form\UpdateUserFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class homepageController extends AbstractController
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/", name="home")
     */
    public function home(): Response
    {
        return $this->render('homepage.html.twig');
    }

    /**
     * @Route("/search")
     */
    public function search(): Response
    {
        return $this->render('search.html.twig');
    }


}