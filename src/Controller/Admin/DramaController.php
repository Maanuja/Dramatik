<?php

namespace App\Controller\Admin;

use App\Entity\Drama;
use App\Form\DramaType;
use App\Repository\DramaRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Cache\CacheInterface;

/**
 * @Route("/admin/drama", name="admin_drama_")
 * @package App\Controller\Admin
 */
class DramaController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(DramaRepository $dramaRepo)
    {
        return $this->render('admin/drama/index.html.twig', [
            'dramas' => $dramaRepo->findAll()
        ]);
    }

    /**
     * @Route("/ajout", name="ajout")
     */
    public function ajoutDrama(Request $request, CacheInterface $cache,EntityManagerInterface $entityManager)
    {
        $drama = new Drama();

        $form = $this->createForm(DramaType::class, $drama);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $image = $form->get('drImg')->getData();
            $newFilename = md5(uniqid()).'.'.$image->guessExtension();
            $image->move(
                $this->getParameter('images_directory'),
                $newFilename
            );
            $drama->setDrImg($newFilename);

            $image2 = $form->get('drBannerImg')->getData();
            $newFilename2 = md5(uniqid()).'.'.$image2->guessExtension();
            $image2->move(
                $this->getParameter('images_directory'),
                $newFilename2
            );
            $drama->setDrBannerImg($newFilename2);
            $drama->setCreatedAt(new \DateTimeImmutable());

            $entityManager->persist($drama);
            $entityManager->flush();

            // On efface le cache
            $cache->delete('drama_list');

            $this->addFlash('DramaAjouter', 'Drama ajouté avec succès');
            return $this->redirectToRoute('admin_drama_home');
        }

        return $this->render('admin/drama/ajout.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/modifier/{id}", name="modifier")
     */
    public function ModifCategorie(Drama $drama, Request $request, CacheInterface $cache,EntityManagerInterface $entityManager)
    {
        $form = $this->createForm(DramaType::class, $drama);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            if($form->get('drImg')->getData()) {
                $imagedel=$drama->getDrImg();
                if($imagedel){
                    //chemin physique de l'image
                    $imgnom=$this->getParameter('images_directory') . '/' . $imagedel;
                    if(file_exists($imgnom)){
                        //suppression
                        unlink($imgnom);
                    }
                }
                $image = $form->get('drImg')->getData();
                $newFilename = md5(uniqid()) . '.' . $image->guessExtension();
                $image->move(
                    $this->getParameter('images_directory'),
                    $newFilename
                );
                $drama->setDrImg($newFilename);
            }
            if($form->get('drBannerImg')->getData()) {
                $imagedel2 = $drama->getDrBannerImg();
                if($imagedel2){
                    //chemin physique de l'image
                    $imgnom2 = $this->getParameter('images_directory') . '/' . $imagedel2;
                    if(file_exists($imgnom2))
                        //suppression
                        unlink($imgnom2);
                }

                $image2 = $form->get('drBannerImg')->getData();
                $newFilename2 = md5(uniqid()) . '.' . $image2->guessExtension();
                $image2->move(
                    $this->getParameter('images_directory'),
                    $newFilename2
                );
                $drama->setDrBannerImg($newFilename2);
            }
            $drama->setUpdatedAt(new \DateTimeImmutable());


            $entityManager->persist($drama);
            $entityManager->flush();

            // On supprime le cache
            $cache->delete('drama_list');

            $this->addFlash('DramaModifier', 'Drama modifié avec succès');
            return $this->redirectToRoute('admin_drama_home');
        }

        return $this->render('admin/drama/modif.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/supprimer/{id}", name="supprimer")
     */
    public function supprimer(Drama $drama,EntityManagerInterface $entityManager)
    {
        $imagedel=$drama->getDrImg();
        if($imagedel){
            //chemin physique de l'image
            $imgnom=$this->getParameter('images_directory') . '/' . $imagedel;
            if(file_exists($imgnom)){
                //suppression
                unlink($imgnom);
            }
        }

        $imagedel2 = $drama->getDrBannerImg();
        if($imagedel2){
            //chemin physique de l'image
            $imgnom2 = $this->getParameter('images_directory') . '/' . $imagedel2;
            if(file_exists($imgnom2))
                //suppression
                unlink($imgnom2);
        }

        $entityManager->remove($drama);
        $entityManager->flush();

        $this->addFlash('DramaSupprimer', 'Drama supprimé avec succès');
        return $this->redirectToRoute('admin_drama_home');
    }

}