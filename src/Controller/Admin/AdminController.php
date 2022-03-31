<?php

namespace App\Controller\Admin;

use App\Form\UpdateUserFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin", name="admin_")
 * @package App\Controller\Admin
 */
class AdminController extends AbstractController
{
    /**
     * @Route("/", name="admin")
     */
    public function index()
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }

    /**
     * @Route("/admin/admininfo", name="modify_admininfo")
     */
    public function update(Request $request,EntityManagerInterface $entityManager): Response
    {
        $user= $this->getUser();
        $form = $this->createForm(UpdateUserFormType::class, $user);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            if ( $form->get('UsImg')->getData() != null){
                $imagedel=$user->getUsImg();
                if($imagedel){
                    //chemin physique de l'image
                    $imgnom=$this->getParameter('images_directory') . '/' . $imagedel;
                    if(file_exists($imgnom)){
                        //suppression
                        unlink($imgnom);
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
            elseif ($form->get('UsImg')->getData() == null ){
                $this->addFlash('ppfail', 'Votre photo de profil n\'a pas  été mise à jour!');
            }

            $entityManager->persist($user);
            $entityManager->flush();

            $this->addFlash('success', 'Votre profil a été mise à jour!');

            return $this->redirectToRoute('admin_admin');
        }

        $this->addFlash('Fail', 'Votre profil n\'a pas été mise à jour!');

        return $this->render("admin/editprofil.html.twig", [
            "form_userinfo" => $form->createView(),
        ]);
    }

}