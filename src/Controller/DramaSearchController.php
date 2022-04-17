<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use FOS\ElasticaBundle\Finder\PaginatedFinderInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DramaSearchController extends AbstractController
{
    private PaginatedFinderInterface $finder;

    public function __construct(PaginatedFinderInterface $finder){
        $this->finder = $finder;
    }

    /**
     * @Route("/searchdr/", name="searchDr")
     */
    public function uneRecherch(Request $request,PaginatorInterface $paginator): Response
    {
        $results = $this->finder->find($request->get('search'));
        $pagination = $paginator->paginate($results, $request->query->getInt('page', 1),
            4);

/*        if(empty($results)){
            return $this->redirectToRoute('searchQz');
        }*/
    return $this->render('search.html.twig', ['resultDr'=>$pagination]);
    }

}