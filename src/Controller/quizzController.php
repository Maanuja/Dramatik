<?php

namespace App\Controller;


use DateTimeZone;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\Persistence\ManagerRegistry;
use Psr\Container\ContainerInterface;
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
    public function quizBook(): Response
{
    return $this->render('quizzBook.html.twig');
}
    /**
     * @Route("/qcre", name="quizzCreation")
     */
    public function quizzcreate(Request $request, SluggerInterface $slugger): Response
    {
        $formquiz = $this->createForm(formQuizzC::class);

        $formquiz->handleRequest($request);
        if ($formquiz->isSubmitted() && $formquiz->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated


            $drama = $this->entityManager->getRepository(Drama::class)->findOneBy(array('drName' => $formquiz->get('drama')->getData()));
            $user = $this->entityManager->getRepository(User::class)->findOneBy(array('id' => 1));
            $var = $formquiz->get('nombre')->getData();

            $imageFile = $formquiz->get('file')->getData();
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


                if ($drama && $user) {
                    $quizz = new Quizz();
                    $quizz->setQzName($formquiz->get('titre')->getData());
                    $quizz->setQzDrama($drama);
                    $quizz->setQzCreatedAt(\DateTime::createFromFormat('Y-m-d H:i:s', date('Y-m-d H:i:s'), new DateTimeZone('Europe/Paris')));
                    $quizz->setQzFormat($formquiz->get('nombre')->getData());
                    $quizz->setQzImg($newFilename);
                    $quizz->setQzUser($user);

                    // ... perform some action, such as saving the task to the database

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

        $questionForm = $this->createForm(formQuestionc::class);
        $questionForm->handleRequest($request);
        if ($questionForm->isSubmitted() && $questionForm->isValid()) {
            if ($nb == 0) {
                return $this->render('quizzCreate/questionCreate.html.twig', ["fin" => "fin"]);
            }else {
                $this->entityManager = $this->entityManager->getManager();


                $question = new Questions();
                $question->setQtQuestion($questionForm->get('question')->getData());
                $question->setQtQuizz($quiz);

                $choice1 = new Choices();
                $choice1->setChChoice($questionForm->get('choice1')->getData());
                $choice1->setChTrue(true);
                $choice1->setChQuestion($question);

                $choice2 = new Choices();
                $choice2->setChChoice($questionForm->get('choice2')->getData());
                $choice2->setChTrue(false);
                $choice2->setChQuestion($question);

                $choice3 = new Choices();
                $choice3->setChChoice($questionForm->get('choice3')->getData());
                $choice3->setChTrue(false);
                $choice3->setChQuestion($question);

                $choice4 = new Choices();
                $choice4->setChChoice($questionForm->get('choice4')->getData());
                $choice4->setChTrue(false);
                $choice4->setChQuestion($question);

                $this->entityManager->persist($question);
                $this->entityManager->persist($choice1);
                $this->entityManager->persist($choice2);
                $this->entityManager->persist($choice3);
                $this->entityManager->persist($choice4);

                $this->entityManager->flush();

                return $this->redirectToRoute('creationQuestion', ['idQz' => $quiz->getId(), 'nb' => $nb - 1]);

            }
        }




        return $this->renderForm('quizzCreate/questionCreate.html.twig', ["formquest"=>$questionForm, "nombre"=>$nb, "img"=> $quiz->getQzImg()]);
    }

    /**
     * @Route("/{quizzId}/question", name="quest")
     */
    public function question(int $quizzId, Request $request): Response
    {
        $listQuestions = $this->entityManager->getRepository(Questions::class)->findBy(array('qtQuizz' => $quizzId));
        $correction = [];

        //var_dump($listQuestions);
        foreach($listQuestions as $ea){
            //liste imbriqué
            //recup les choix String
            $choice = $ea->getChoices();
            foreach ($choice as $ch){
                if($ch->getChTrue()) {
                    $correction[$ea->getId()] = $ch->getChChoice();
                }
            }

                //= $this->>entityManager->getRepository(Choices::class)->findBy(array('chQuestion' => $ea->getId()));
            //si bool true, on ajoute à la liste de correction

        }
        //var_dump($correction);

        $questionForm = $this->createForm(formQuestion::class, $listQuestions);


        //$questionForm = $this->createForm('Form/formQuestion.php');
        $questionForm->handleRequest($request);

        if ($questionForm->isSubmitted() && $questionForm->isValid()) {
            var_dump($questionForm->getData());
            //array_diff($correction,$questionForm->getData());

            return $this->redirectToRoute('creationQuestion');
        }

        return $this->renderForm('quizzPlay/quizzPlay.html.twig', ['form' => $questionForm, 'numberQuestion' => sizeof($listQuestions)]);
    }

    /**
     * @Route("/quizz/{id}", name="quizzStart")
     */
    public function quizz(int $id){
        return $this->render('quizzPlay/quizzStart.html.twig');
    }

}