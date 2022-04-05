<?php

namespace App\Controller\Quizz;


use DateTimeZone;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\FormQuizzC;
use App\Entity\Quizz;
use App\Entity\Questions;
use App\Entity\Choices;
use Symfony\Component\String\Slugger\SluggerInterface;

class quizzController extends AbstractController
{
    private EntityManagerInterface $entityManager;
    private SluggerInterface $slugger;

    public function __construct(EntityManagerInterface $entityManager, SluggerInterface $slugger)
    {
        $this->entityManager = $entityManager;
        $this->slugger = $slugger;
    }


    /**
     * @Route("/qcre", name="quizzCreation")
     */
    public function quizzcreate(Request $request): Response
    {
        $formquiz = $this->createForm(FormQuizzC::class);

        $formquiz->handleRequest($request);
        if ($formquiz->isSubmitted() && $formquiz->isValid()) {

            $user = $this->getUser();
            $var = $formquiz->get('qzFormat')->getData();

            $imageFile = $formquiz->get('qzImg')->getData();
            if ($imageFile) {
                $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $this->slugger->slug($originalFilename);
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
                    $quizz->setQzApproved(false);

                    $this->entityManager->persist($quizz);
                    $this->entityManager->flush();

                    return $this->redirectToRoute('creationQuestion', ['idQz' => $quizz->getId(), 'nb' => $var]);
                }
            }
            else{
                $this->addFlash('error', "Veuillez selectionner une image pour votre quizz");

            }
        }
        return $this->renderForm('quizzCreate/quizzCreate.html.twig', ["formquizz" => $formquiz]);

    }

    /**
     * @Route("/qzmodify/{quizzId}", name="updateQuizz")
     */
    public function updateQuizz(int $quizzId, Request $request):Response
    {
        $quizz = $this->entityManager->getRepository(Quizz::class)->find($quizzId);

        if (!$quizz) {
            throw $this->createNotFoundException(
                'No product found for this quizz '
            );
        }

        $formquiz = $this->createForm(FormQuizzC::class);
        $formquiz->handleRequest($request);

        if ($formquiz->isSubmitted() && $formquiz->isValid()) {

            $quizz->setQzName($formquiz->get('qzName')->getData());
            $quizz->setQzDrama($formquiz->get('qzDrama')->getData());
            $quizz->setQzUpdatedAt(\DateTime::createFromFormat('Y-m-d H:i:s', date('Y-m-d H:i:s'), new DateTimeZone('Europe/Paris')));
            $quizz->setQzFormat($formquiz->get('qzFormat')->getData());

            $imageFile = $formquiz->get('qzImg')->getData();
            if ($imageFile != null) {
                $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $this->slugger->slug($originalFilename);
                $newFilename = $safeFilename . '-' . uniqid() . '.' . $imageFile->guessExtension();


                try {
                    $imageFile->move(
                        $this->getParameter('imgquizz_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    return $this->renderForm('quizzCreate/quizzCreate.html.twig', ["formquizz" => $formquiz, "errImg" => "erreurDossier"]);
                }
                $quizz->setQzImg($newFilename);
            }

            $this->entityManager->flush();
            $this->addFlash('modified', 'quizz <i>'.$quizz->getQzName().' </i>mis à jour avec succès');
            return $this->redirectToRoute('myQuizz');
        }

        return $this->renderForm('quizzCreate/quizzUpdate.html.twig', ["formquizz" => $formquiz, "quizz"=>$quizz]);
    }

    /**
     * @Route("/qzdelete/{quizzId}", name="deleteQuizz")
     */
    public function deleteQuizz(int$quizzId): Response
    {
        $quizz = $this->entityManager->getRepository(Quizz::class)->find($quizzId);
        $questions = $quizz->getQuestions();

        foreach ($questions as $question){
            $choices = $question->getChoices();
            foreach($choices as $choice){
                $this->entityManager->remove($choice);
            }
            $this->entityManager->remove($question);
        }
        $name = $quizz->getQzName();
        $this->entityManager->remove($quizz);
        $this->entityManager->flush();
        $this->addFlash('modified', 'quizz <i>'.$name.' </i>supprimer avec succès');
        return $this->redirectToRoute('myQuizz');
    }

    /**
     * @Route("/qzValidate/{quizzId}", name="approveQuizz")
     */
    public function approveQuizz(int $quizzId = null): Response
    {
        $quizz = $this->entityManager->getRepository(Quizz::class)->findBy(array('qzApproved' => false));
        if($quizzId){
            $quizz = $this->entityManager->getRepository(Quizz::class)->find($quizzId);
            $quizz->setQzApproved(true);
            $this->entityManager->flush();

            $this->addFlash('approved', 'quizz <i>'.$quizz->getQzName().' </i>valider avec succès');
            return $this->redirectToRoute('approveQuizz');
        }
        return $this->render('Admin/approvalQuizz.html.twig', ['quizzes'=>$quizz]);
    }
}