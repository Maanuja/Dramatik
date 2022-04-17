<?php

namespace App\Controller;

use App\Entity\Drama;
use App\Repository\DramaRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AbcdaireController extends AbstractController
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/drama/abcdaire', name: 'abcdaire')]
    public function index(): Response
    {
        $dramas= $this->entityManager->getRepository(Drama::class)->findAll();
        $al = $this->getAlphabet();

        return $this->render('drama/abcdaire.html.twig', [
            'dramas' => $dramas,
            'alphabet' => $al,
        ]);
    }

    #[Route('/drama/abcdaire/{letter}', name: 'abcdaire_filter')]
    public function filter(string $letter): Response
    {
        $al = $this->getAlphabet();
        $filter = $this->entityManager->getRepository(Drama::class)->findDramaByLetter($letter);

        if($filter == null){
            $this->addFlash('NoDrama', 'Malheureusement nos admins n\'ont pas pu mettre de dramas dans cette catégorie. :(');
            $filter =$this->entityManager->getRepository(Drama::class)->findAll();
        }

        return $this->render('drama/abcdaire.html.twig', [
            'dramas' => $filter,
            'alphabet' => $al,
        ]);
    }

    /**
     * @return array
     */
    public function getAlphabet(): array
    {
        $alph = ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z"];
        $al = array();
        foreach ($alph as $val) {
            $boolean = $this->entityManager->getRepository(Drama::class)->findDramaByLetter($val);
            if ($boolean != null) {
                $al[] = $val;
            }
        }
        return $al;
    }
}
