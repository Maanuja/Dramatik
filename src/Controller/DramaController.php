<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Entity\Critic;
use App\Entity\Drama;
use App\Entity\Genre;
use App\Entity\Quizz;
use App\Entity\User;
use App\Form\CritiqueFormType;
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
    #[Route('/drama/critique/{drName}/{id}', name: 'critique')]
    #[Route('/drama/commentaire/{drName}/{id}', name: 'comments')]

    public function read(Request $request, string $drName,int $id,PaginatorInterface $paginator): Response
    {
        $drama = $this->entityManager->getRepository(Drama::class)->find($id);
        $critiques= $this->entityManager->getRepository(Critic::class)->findAll();
        $comments= $this->entityManager->getRepository(Comment::class)->findAll();


        $data = $this->entityManager->getRepository(Quizz::class)->findAll();

        $quizzes = $paginator->paginate(
            $data,
            $request->query->getInt('page', 1),
            2
        );

        $critique= new Critic();
        $form = $this->createForm(CritiqueFormType::class, $critique);

        $form->handleRequest($request);


        if($form->isSubmitted() && $form->isValid()){
            $user= $this->getUser();
            if($user == null){
                $this->addFlash('login plz','Il faut se connecter pour critiquer!');
            }
            $critique->setCrCreatedAt(new \DateTime());
            $critique->setCrDrama($drama);
            $critique->setCrUser($user);
            $this->entityManager->persist($critique);
            $this->entityManager->flush();
        }
        return $this->render('drama/readDrama.html.twig', [
            'drama' => $drama,
            'quizzes'=>$quizzes,
            'form' =>$form->createView(),
            'comments' => $comments,
            'critiques' => $critiques,
        ]);
    }
}
