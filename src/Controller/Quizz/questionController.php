<?php

namespace App\Controller\Quizz;

use DateTimeZone;
use Doctrine\ORM\EntityManagerInterface;
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
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/qtcrea/{idQz}/{nb}", name="creationQuestion")
     */
    public function questionc(int $idQz, int $nb, Request $request): Response
    {
        $quiz = $this->entityManager->getRepository(Quizz::class)->find($idQz);
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


            return $this->redirectToRoute('creationQuestion', ['idQz' => $idQz, 'nb' => $nb - 1]);


        }

        return $this->renderForm('quizzCreate/questionCreate.html.twig', ["formquest"=>$questioncForm, "nombre"=>$nb, "img"=> $quiz->getQzImg()]);
    }


    /**
     * @Route("/qstmodify/{quizzId}/{nb}", name="modifyQuestion")
     */
    public function questionUpdate(int $quizzId, int $nb, Request $request): Response
    {
        $quizz = $this->entityManager->getRepository(Quizz::class)->find(array('id' => $quizzId));
        $listQuestions = $this->entityManager->getRepository(Questions::class)->findBy(array('qtQuizz' => $quizzId),array('id'=>'ASC'));
        if($nb == $quizz->getQzFormat() && !empty($listQuestions)){
            $question = $listQuestions[0];
        }
        elseif(($quizz->getQzFormat() - $nb)< count($listQuestions) && !empty($listQuestions)){
            $question = $listQuestions[$quizz->getQzFormat() - $nb];
        }

        $questioncForm = $this->createForm(FormQuestionc::class);
        $questioncForm->handleRequest($request);

        if ($questioncForm->isSubmitted() && $questioncForm->isValid()) {
            if(isset($question)){
                $choices = $this->entityManager->getRepository(Choices::class)->findBy(array('chQuestion' => $question->getId()));
            }
            else{
                $question = new Questions();
                $quiz = $this->entityManager->getRepository(Quizz::class)->find($quizzId);
                $question->setQtQuizz($quiz);
            }
            $question->setQtQuestion($questioncForm->get('question')->getData());

            $quizz->setQzUpdatedAt(\DateTime::createFromFormat('Y-m-d H:i:s', date('Y-m-d H:i:s'), new DateTimeZone('Europe/Paris')));
            $this->entityManager->persist($question);

            for($i=1; $i<=4; $i++){
                if (isset($choices)) {
                    $choice = $choices[$i - 1];
                }
                else{
                    $choice =new Choices();
                }
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
                $this->addFlash('modified', 'quizz <i>'.$quizz->getQzName().' </i>mis à jour avec succès');
                return $this->redirectToRoute('myQuizz');
            }


            return $this->redirectToRoute('modifyQuestion', ['quizzId' => $quizzId, 'nb' => $nb - 1]);
        }

        if (isset($question)) {
            return $this->renderForm('quizzCreate/questionUpdate.html.twig', ["formquest" => $questioncForm, "nombre" => $nb, 'question' => $question, "img" => $quizz->getQzImg()]);
        }
        else {
            return $this->renderForm('quizzCreate/questionUpdate.html.twig', ["formquest" => $questioncForm, "nombre" => $nb, "img" => $quizz->getQzImg()]);
        }
    }
}