<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\FormQuestionc;
use App\Entity\Quizz;
use App\Entity\Questions;
use App\Entity\Choices;

class questionController extends AbstractController
{
    /**
     * @Route("/qtcrea/{idQz}/{nb}", name="creationQuestion")
     */
    public function questionc(int $idQz, int $nb, Request $request): Response
    {
        $quiz = $this->entityManager->getRepository(Quizz::class)->findOneBy(array('id' => $idQz));
        if ($nb<0 || !$quiz) {
            return $this->redirectToRoute('home');
        }


        $questioncForm = $this->createForm(FormQuestionc::class);
        $questioncForm->handleRequest($request);
        if ($questioncForm->isSubmitted() && $questioncForm->isValid()) {

            $question = new Questions();
            $question->setQtQuestion($questioncForm->get('question')->getData());
            $question->setQtQuizz($quiz);
            $this->entityManager->persist($question);


            for($i=1; $i<=4; $i++){
                $choice = new Choices();
                $choice->setChChoice($questioncForm->get('choice'.$i)->getData());
                if($i == 1){
                    $choice->setChTrue(true);
                }
                else{
                    $choice->setChTrue(false);
                }
                $choice->setChQuestion($question);
                $this->entityManager->persist($choice);
            }



            $this->entityManager->flush();


            if ($nb == 1) {
                return $this->redirectToRoute('quizzB',  ["created" => "created"]);
            }


            return $this->redirectToRoute('creationQuestion', ['idQz' => $quiz->getId(), 'nb' => $nb - 1]);


        }

        return $this->renderForm('quizzCreate/questionCreate.html.twig', ["formquest"=>$questioncForm, "nombre"=>$nb, "img"=> $quiz->getQzImg()]);
    }

    /**
     * @Route("/qtdel/{idQz}", name="deleteQuestion")
     */
    public function questionDelete(int $idQz){

       /* $entityManager->remove($product);
        $entityManager->flush();*/
    }
}