<?php

namespace App\Controller;


use DateTimeZone;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\formQuestionc;
use App\Form\formQuizzC;
use App\Form\formQuestion;
use App\Entity\Quizz;
use App\Entity\Drama;
use App\Entity\User;
use App\Entity\Questions;
use App\Entity\Choices;
use App\Entity\Score;
use Symfony\Component\String\Slugger\SluggerInterface;

class quizzController extends AbstractController
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/quizzBook", name="quizB")
     */
    public function quizBook(Request $request, PaginatorInterface $paginator): Response
    {
        $data = $this->entityManager->getRepository(Quizz::class)->findAll();
        $recent = $this->entityManager->getRepository(Quizz::class)->findRecentQuizz();

        $quizzes = $paginator->paginate(
            $data,
            $request->query->getInt('page', 1),
            2
        );

        return $this->render('quizzBook.html.twig', ['quizzes'=>$quizzes, 'recent'=>$recent]);
    }
    /**
     * @Route("/qcre", name="quizzCreation")
     */
    public function quizzcreate(Request $request, SluggerInterface $slugger): Response
    {
        $formquiz = $this->createForm(formQuizzC::class);

        $formquiz->handleRequest($request);
        if ($formquiz->isSubmitted() && $formquiz->isValid()) {


//            $user = $this->getUser();
            $user = $this->entityManager->getRepository(User::class)->findOneBy(array('id' => 1));
            $var = $formquiz->get('qzFormat')->getData();

            $imageFile = $formquiz->get('qzImg')->getData();
            if ($imageFile) {
                $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename . '-' . uniqid() . '.' . $imageFile->guessExtension();


                try {
                    $imageFile->move(
                        $this->getParameter('imgquizz_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    return $this->renderForm('quizzCreate/quizzCreate.html.twig', ["formquizz" => $formquiz, "errImg" => "erreurDossier"]);

                }


                if ($user) {
                    $quizz = new Quizz();
                    $quizz->setQzName($formquiz->get('qzName')->getData());
                    $quizz->setQzDrama($formquiz->get('qzDrama')->getData());
                    $quizz->setQzCreatedAt(\DateTime::createFromFormat('Y-m-d H:i:s', date('Y-m-d H:i:s'), new DateTimeZone('Europe/Paris')));
                    $quizz->setQzFormat($formquiz->get('qzFormat')->getData());
                    $quizz->setQzImg($newFilename);
                    $quizz->setQzUser($user);

                    $this->entityManager->persist($quizz);
                    $this->entityManager->flush();

                    return $this->redirectToRoute('creationQuestion', ['idQz' => $quizz->getId(), 'nb' => $var]);
                }
            }
        }
        return $this->renderForm('quizzCreate/quizzCreate.html.twig', ["formquizz" => $formquiz]);

    }
    /**
     * @Route("/qtcrea/{idQz}/{nb}", name="creationQuestion")
     */
    public function questionc(int $idQz, int $nb, Request $request): Response
    {
        $quiz = $this->entityManager->getRepository(Quizz::class)->findOneBy(array('id' => $idQz));
        if ($nb<0 || !$quiz) {
            return $this->redirectToRoute('home');
        }


        $questioncForm = $this->createForm(formQuestionc::class);
        $questioncForm->handleRequest($request);
        if ($questioncForm->isSubmitted() && $questioncForm->isValid()) {



            $question = new Questions();
            $question->setQtQuestion($questioncForm->get('question')->getData());
            $question->setQtQuizz($quiz);

            $choices = array();
            for($i=1; $i<=4; $i++){
                $choice = new Choices();
                $choice->setChChoice($questioncForm->get('choice'.$i)->getData());
                if($i=1){
                    $choice->setChTrue(true);
                }
                else{
                    $choice->setChTrue(false);
                }
                $choice->setChQuestion($question);
                $choices[] = $choice;
            }

            $this->entityManager->persist($question);
            foreach ($choices as $choice){
                $this->entityManager->persist($choice);
            }

            $this->entityManager->flush();


            if ($nb == 1) {
                return $this->render('quizzCreate/questionCreate.html.twig', ["fin" => "fin"]);
            }


            return $this->redirectToRoute('creationQuestion', ['idQz' => $quiz->getId(), 'nb' => $nb - 1]);


        }

        return $this->renderForm('quizzCreate/questionCreate.html.twig', ["formquest"=>$questioncForm, "nombre"=>$nb, "img"=> $quiz->getQzImg()]);
    }

    /**
     * @Route("/{quizzId}/question", name="quest")
     */
    public function question(int $quizzId, Request $request): Response
    {
        $listQuestions = $this->entityManager->getRepository(Questions::class)->findBy(array('qtQuizz' => $quizzId));

        $quiz = $this->entityManager->getRepository(Quizz::class)->findOneBy(array('id' => $quizzId));



        $questionForm = $this->createForm(formQuestion::class, $listQuestions);
        $questionForm->handleRequest($request);

        if ($questionForm->isSubmitted() && $questionForm->isValid()) {

            $count = 0;
            for ($i=0; $i<sizeof($listQuestions);$i++){
                if('true' == $questionForm->get('choice'.$i)->getData()){
                    $count++;
                }
            }

//            $user = $this->getUser();
            $user = $this->entityManager->getRepository(User::class)->findOneBy(array('id' => 1));

            $ancienScore = $this->entityManager->getRepository(Score::class)->findOneBy(array('scQuizz' => $quizzId,'scUser'=> $user));
            if(!$ancienScore){
                $ancienScore = new Score();
                $ancienScore->setScScore($count);
                $ancienScore->setScQuizz($quiz);
                $ancienScore->setScUser($user);
            }
            elseif($ancienScore<$count){
                $ancienScore->setScScore($count);
            }

            $this->entityManager->persist($ancienScore);
            $this->entityManager->flush();

            return $this->render('quizzPlay/quizzResult.html.twig',["img"=> $quiz->getQzImg(),"score"=> $count]);

        }

        return $this->renderForm('quizzPlay/quizzPlay.html.twig', ['qstform' => $questionForm, 'numberQuestion' => sizeof($listQuestions), "img"=> $quiz->getQzImg()]);
    }

    /**
     * @Route("/quizz/{id}", name="quizzStart")
     */
    public function quizz(int $id){
        return $this->render('quizzPlay/quizzStart.html.twig');
    }

}