<?php

namespace App\Controller;


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

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }


    /**
     * @Route("/qcre", name="quizzCreation")
     */
    public function quizzcreate(Request $request, SluggerInterface $slugger): Response
    {
        $formquiz = $this->createForm(FormQuizzC::class);

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

}