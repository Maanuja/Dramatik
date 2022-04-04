<?php

namespace App\Controller;

use App\Entity\Drama;
use App\Entity\Genre;
use App\Entity\Quizz;
use App\Entity\User;
use App\Repository\DramaRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
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
        $dramas= $this->entityManager->getRepository(Drama::class)->findAll();
        $genres= $this->entityManager->getRepository(Genre::class)->findAll();

        return $this->render('drama/index.html.twig', [
            'dramas' => $dramas,
            'genres' => $genres,
        ]);
    }
    #[Route('/drama/genre/{genre}/{id}', name: 'filter_genre')]
    public function filter(int $id): Response
    {
        $filter = $this->entityManager->getRepository(Drama::class)->findDramaGenre($id);
        $genres= $this->entityManager->getRepository(Genre::class)->findAll();
        return $this->render('drama/index.html.twig', [
            'genres' => $genres,
            'dramas' => $filter
        ]);
    }
    #[Route('/drama/{drName}/{id}', name: 'dramaview')]
    public function read(Request $request, string $drName,int $id,PaginatorInterface $paginator): Response
    {
        $drama = $this->entityManager->getRepository(Drama::class)->find($id);

        $genreId = $drama->getDrGenre();
        $genreName = $this->entityManager->getRepository(Genre::class)->find($genreId);
        $genre = $genreName->getGrName();

        $adminId = $drama->getDrAdminId();
        $adminName = $this->entityManager->getRepository(User::class)->find($adminId);
        $admin = $adminName->getUsFname();

        $data = $this->entityManager->getRepository(Quizz::class)->findAll();

        $quizzes = $paginator->paginate(
            $data,
            $request->query->getInt('page', 1),
            2
        );

        return $this->render('drama/readDrama.html.twig', [
            'drama' => $drama,
            'Admin' => $admin,
            'genre' => $genre,
            'quizzes'=>$quizzes,
        ]);
    }
}
