<?php

namespace App\Controller;

use App\Entity\Quizz;
use App\Repository\DramaRepository;
use App\Repository\GenreRepository;
use Doctrine\ORM\EntityManagerInterface;
//use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DramaController extends AbstractController
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/drama', name: 'drama')]
    public function index(): Response
    {
        return $this->render('drama/index.html.twig', [
            'controller_name' => 'DramaController',
        ]);
    }

    #[Route('/drama/abcdaire', name: 'abcdaire')]
    public function abcdaire(DramaRepository $dramaRepo): Response
    {
        return $this->render('drama/abcdaire.html.twig', [
            'dramas' => $dramaRepo->findAll()
        ]);
    }

    #[Route('/drama/{drName}/{id}', name: 'dramaview')]
    //PaginatorInterface $paginator
    public function read(Request $request, string $drName,int $id,DramaRepository $dramaRepo, GenreRepository $genreRepo): Response
    {
        $drama = $dramaRepo->find($id);

        $genreId = $drama->getDrGenre();
        $genreName = $genreRepo->find($genreId);
        $genre = $genreName->getGrName();

        $data = $this->entityManager->getRepository(Quizz::class)->findAll();

//        $quizzes = $paginator->paginate(
//            $data,
//            $request->query->getInt('page', 1),
//            2
//        );

        return $this->render('drama/readDrama.html.twig', [
            'drama' => $drama,
            'Admin' => $this->getUser(),
            'genre' => $genre,
            //'quizzes'=>$quizzes,
        ]);
    }
}
