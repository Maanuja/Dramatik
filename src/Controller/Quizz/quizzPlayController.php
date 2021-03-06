<?php

namespace App\Controller\Quizz;

use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\FormQuestion;
use App\Entity\Quizz;
use App\Entity\Questions;
use App\Entity\Score;

class quizzPlayController extends AbstractController
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/quizzBook/{created}", name="quizzB")
     */
    public function quizBook(Request $request, PaginatorInterface $paginator, string $created=""): Response
    {
        $data = $this->entityManager->getRepository(Quizz::class)->findBy(array('qzApproved'=>true));
        $recent = $this->entityManager->getRepository(Quizz::class)->findRecentQuizz();

        $quizzes = $paginator->paginate(
            $data,
            $request->query->getInt('page', 1),
            12
        );

        return $this->render('quizzBook.html.twig', ['quizzes'=>$quizzes, 'recent'=>$recent, 'created'=>$created]);
    }

    /**
     * @Route("/{quizzId}/question", name="quest")
     */
    public function question(int $quizzId, Request $request): Response
    {
        $listQuestions = $this->entityManager->getRepository(Questions::class)->findBy(array('qtQuizz' => $quizzId));
        //shuffle($listQuestions);
        $quiz = $this->entityManager->getRepository(Quizz::class)->find($quizzId);

        $questionForm = $this->createForm(FormQuestion::class, $listQuestions);
        $questionForm->handleRequest($request);

        if ($questionForm->isSubmitted() && $questionForm->isValid()) {

            $count = 0;
            for ($i=0; $i<sizeof($listQuestions);$i++){
                if('true' == $questionForm->get('choice'.$i)->getData()){
                    $count++;
                }
            }

            $user = $this->getUser();
//            $user = $this->entityManager->getRepository(User::class)->findOneBy(array('id' => 1));

            $ancienScore = $this->entityManager->getRepository(Score::class)->findOneBy(array('scQuizz' => $quizzId,'scUser'=> $user));
            if(!$ancienScore){
                $ancienScore = new Score();
                $ancienScore->setScScore($count);
                $ancienScore->setScQuizz($quiz);
                $ancienScore->setScUser($user);
            }
            elseif($ancienScore->getScScore()<$count){
                $ancienScore->setScScore($count);
            }

            $this->entityManager->persist($ancienScore);
            $this->entityManager->flush();

            return $this->render('quizzPlay/quizzResult.html.twig',["quizz"=> $quiz,"score"=> $count]);

        }

        return $this->renderForm('quizzPlay/quizzPlay.html.twig', ['qstform' => $questionForm, 'numberQuestion' => sizeof($listQuestions), "img"=> $quiz->getQzImg()]);
    }

    /**
     * @Route("/quizz/{id}", name="quizzStart")
     */
    public function quizz(int $id){
        if(!$this->getUser()){
            return $this->redirectToRoute('app_register');
        }
        $quiz = $this->entityManager->getRepository(Quizz::class)->find($id);
        return $this->render('quizzPlay/quizzStart.html.twig', ['quizz'=> $quiz]);
    }

}