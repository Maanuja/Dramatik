<?php

namespace App\Controller;


use DateTimeZone;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\formQuestionc;
use App\Form\formQuizzC;
use App\Entity\Quizz;
use App\Entity\Questions;
use App\Entity\Choices;
use Symfony\Component\String\Slugger\SluggerInterface;

class quizzController extends AbstractController
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }


    /**
     * @Route("/qcre", name="quizzCreation")
     */
    public function quizzcreate(Request $request, SluggerInterface $slugger): Response
    {
        $formquiz = $this->createForm(formQuizzC::class);

        $formquiz->handleRequest($request);
        if ($formquiz->isSubmitted() && $formquiz->isValid()) {


            $user = $this->getUser();
//            $user = $this->entityManager->getRepository(User::class)->findOneBy(array('id' => 1));
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
                return $this->render('quizzCreate/questionCreate.html.twig', ["fin" => "fin"]);
            }


            return $this->redirectToRoute('creationQuestion', ['idQz' => $quiz->getId(), 'nb' => $nb - 1]);


        }

        return $this->renderForm('quizzCreate/questionCreate.html.twig', ["formquest"=>$questioncForm, "nombre"=>$nb, "img"=> $quiz->getQzImg()]);
    }
}