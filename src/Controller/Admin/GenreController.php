<?php

namespace App\Controller\Admin;

use App\Entity\Drama;
use App\Entity\Genre;
use App\Form\GenreType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/admin/genre", name="admin_genre_")
 * @package App\Controller\Admin
 */
class GenreController extends AbstractController
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/', name: 'home')]
    public function index(): Response
    {
        $genres = $this->entityManager->getRepository(Genre::class)->findAll();

        return $this->render('Admin/genre/index.html.twig', [
            'genres' => $genres
        ]);
    }

    /**
     * @Route("/ajout", name="ajout")
     */
    public function ajoutGenre(Request $request)
    {
        $genre = new Genre();

        $form = $this->createForm(GenreType::class, $genre);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            $this->entityManager->persist($genre);
            $this->entityManager->flush();

            $this->addFlash('GenreAjouter', 'Genre ajouté avec succès');
            return $this->redirectToRoute('admin_genre_home');
        }

        return $this->render('admin/genre/ajout.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/modifier/{id}", name="modifier")
     */
    public function modifierGenre(Request $request, Genre $genre,int $id)
    {
        $form = $this->createForm(GenreType::class, $genre);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            $this->entityManager->persist($genre);
            $this->entityManager->flush();

            $this->addFlash('GenreModifier', 'Genre modifié avec succès');
            return $this->redirectToRoute('admin_genre_home');
        }

        return $this->render('admin/genre/ajout.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/supprimer/{id}", name="supprimer")
     */
    public function supprimer(Genre $genre,int $id)
    {

        if ($this->entityManager->getRepository(Drama::class)->findDramaGenre($id) == null){

            $this->entityManager->remove($genre);
            $this->entityManager->flush();

            $this->addFlash('GenreSupprimer', 'Genre supprimé avec succès');
        }
        else{

            $this->addFlash('GenreNotSupprimer', 'Vous ne pouvez pas supprimé ce genre il est lié à des dramas');
        }
        return $this->redirectToRoute('admin_genre_home');
    }
}
