<?php

namespace App\Controller;

use Psr\Container\ContainerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\formQuestionc;

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
        //creer plusieur form avec boucle puis les envoyer
        $arrayForms = array();
        for ($i=0; $i<$_POST['nombre']; $i++) {
            ${"form".$i} = $this->createForm(formQuestionc::class);
            $arrayForms[] = ${"form".$i}->createView();
        }
        return $this->render('quizzCreate/questionCreate.html.twig', ["formlist"=>$arrayForms]);
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