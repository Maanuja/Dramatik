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
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

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
    public function ajoutDrama(Request $request)
    {
        $drama = new Drama();

        $form = $this->createForm(DramaType::class, $drama);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $drama->setDrAdminId($this->getUser());

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

            $this->entityManager->persist($drama);
            $this->entityManager->flush();

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
    public function ModifDrama(Drama $drama, Request $request)
    {
        $form = $this->createForm(DramaType::class, $drama);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            if($form->get('drImg')->getData()) {
                $imageDel=$drama->getDrImg();
                if($imageDel){
                    //chemin physique de l'image
                    $imgnom=$this->getParameter('images_directory') . '/' . $imageDel;
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


            $this->entityManager->persist($drama);
            $this->entityManager->flush();

            $this->addFlash('DramaModifier', 'Drama modifié avec succès');
            return $this->redirectToRoute('admin_drama_home');
        }

        return $this->render('admin/drama/ajout.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/supprimer/{id}", name="supprimer")
     */
    public function supprimer(Drama $drama)
    {
        if ($drama->getQuizzs() == null){
            $imagedel = $drama->getDrImg();
            if ($imagedel) {
                //chemin physique de l'image
                $imgnom = $this->getParameter('images_directory') . '/' . $imagedel;
                if (file_exists($imgnom)) {
                    //suppression
                    unlink($imgnom);
                }
            }

            $imageDel2 = $drama->getDrBannerImg();
            if ($imageDel2) {
                //chemin physique de l'image
                $imgnom2 = $this->getParameter('images_directory') . '/' . $imageDel2;
                if (file_exists($imgnom2))
                    //suppression
                    unlink($imgnom2);
            }

            $this->entityManager->remove($drama);
            $this->entityManager->flush();

            $this->addFlash('DramaSupprimer', 'Drama supprimé avec succès');
        }
        else {
            $this->addFlash('DramaNotSupprimer', 'Drama non supprimé car il a des quizzs');
        }
        return $this->redirectToRoute('admin_drama_home');
    }
}