<?php

namespace App\Controller;

use FOS\ElasticaBundle\Finder\PaginatedFinderInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QuizzSearchController extends AbstractController
{
    private PaginatedFinderInterface $finder;

    public function __construct(PaginatedFinderInterface $finder){
        $this->finder = $finder;
    }


    /**
     * @Route("/searchqz", name="searchQz")
     */
    public function uneRecherch(Request $request,PaginatorInterface $paginator): Response
    {
        $results = $this->finder->find($request->get('search'));
        $pagination = $paginator->paginate($results, $request->query->getInt('page', 1),
            4);
        return $this->render('search.html.twig', ['resultQz'=>$pagination]);
    }
}