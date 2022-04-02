<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UpdateUserFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    #[Route('/account', name: 'account')]
    public function index(): Response
    {
        return $this->render('user/user.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }

    /**
     * @Route("/account/userinfo", name="modify_userinfo")
     */
    public function update(Request $request,EntityManagerInterface $entityManager): Response
    {
        $user= $this->getUser();
        $form = $this->createForm(UpdateUserFormType::class, $user);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            if ( $form->get('UsImg')->getData() != null){
                $imageDel = $entityManager->getRepository(User::class)->find($user)->getUsImg();
                if($imageDel){
                    //chemin physique de l'image
                    $imgNom=$this->getParameter('imguser_directory') . '/' . $imageDel;
                    if(file_exists($imgNom)){
                        //suppression
                        unlink($imgNom);
                    }
                }

                $uploadedFile = $form->get('UsImg')->getData();
                $newFilename = md5(uniqid()).'.'.$uploadedFile->guessExtension();
                $uploadedFile->move(
                    $this->getParameter('imguser_directory'),
                    $newFilename
                );
                $user->setUsImg($newFilename);
                $this->addFlash('ppsuccess', 'Votre photo de profil a été mise à jour!');

            }
            else {
                $this->addFlash('ppfail', 'Votre photo de profil n\'a pas  été mise à jour!');
            }

            if ( $form->get('UsBanImg')->getData() != null){
                $imageDel2 = $user->getUsBanImg();
                if($imageDel2){
                    //chemin physique de l'image
                    $imgNom=$this->getParameter('imguser_directory') . '/' . $imageDel2;
                    if(file_exists($imgNom)){
                        //suppression
                        unlink($imgNom);
                    }
                }

                $uploadedFile = $form->get('UsBanImg')->getData();
                $newFilename = md5(uniqid()).'.'.$uploadedFile->guessExtension();
                $uploadedFile->move(
                    $this->getParameter('imguser_directory'),
                    $newFilename
                );
                $user->setUsBanImg($newFilename);
                $this->addFlash('ppbsuccess', 'Votre bannière de profil a été mise à jour!');

            }
            else {
                $this->addFlash('ppbfail', 'Votre Bannière de profil n\'a pas  été mise à jour!');
            }

            $entityManager->persist($user);
            $entityManager->flush();

            $this->addFlash('success', 'Votre profil a été mise à jour!');

            return $this->redirectToRoute('account');
        }

        $this->addFlash('Fail', 'Votre profil n\'a pas été mise à jour!');

        return $this->render("user/edituser.html.twig", [
            "form_userinfo" => $form->createView(),
        ]);
    }
}
