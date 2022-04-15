<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Entity\Critic;
use App\Entity\Drama;
use App\Entity\Genre;
use App\Entity\Quizz;
use App\Entity\User;
use App\Form\CommentType;
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
        $dataComment = $this->entityManager->getRepository(Comment::class)->findBy(array('cmDrama'=>$drama));
        $comments= $paginator->paginate(
            $dataComment,
            $request->query->getInt('page', 1),
            3
        );

        $quizzes = $this->entityManager->getRepository(Quizz::class)->findBy(array('qzDrama'=>$drama, 'qzApproved'=>true));


        $critique= new Critic();
        $form = $this->createForm(CritiqueFormType::class, $critique,[
            'action' => $id."#critiksection"
        ]);
        $comment= new Comment();
        $formComment = $this->createForm(CommentType::class, $comment,[
            'action' => $id."#commentsection"
        ]);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $user= $this->getUser();
            if($user == null){
                $this->addFlash('login plz','Il faut se connecter pour critiquer!');
                return $this->redirectToRoute('dramaview', ['drName'=>$drName,'id'=>$id]);

            }
            $critique->setCrCreatedAt(new \DateTime());
            $critique->setCrDrama($drama);
            $critique->setCrUser($user);
            $this->entityManager->persist($critique);
            $this->entityManager->flush();

            return $this->redirectToRoute('critique', ['drName'=>$drName,'id'=>$id]);
        }

        $formComment->handleRequest($request);

        if($formComment->isSubmitted() && $formComment->isValid()){

            $comment->setCmDate(new \DateTime());
            $comment->setCmDrama($drama);
            $this->entityManager->persist($comment);
            $this->addFlash('CommentPosted','Votre commentaire est posté!!');
            $this->entityManager->flush();
            return $this->redirectToRoute('comments', ['drName'=>$drName,'id'=>$id]);
        }
        return $this->render('drama/readDrama.html.twig', [
            'drama' => $drama,
            'quizzes'=>$quizzes,
            'form' =>$form->createView(),
            'formComment' =>$formComment->createView(),
            'comments' => $comments,
            'critiques' => $critiques,
        ]);
    }

    /**
     * @Route("/drama/commentaire/{drName}/{id}/{idc}", name="deleteComment")
     */
    public function supprimer(int $id,int $idc)
    {
        return $this->redirectToRoute('dramaview');
    }
}
