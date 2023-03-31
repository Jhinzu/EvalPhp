<?php

namespace App\Controller;

use App\Form\SearchFormType;
use App\Repository\AnnoncesRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AllAnnoncesController extends AbstractController
{   
    #[Route('/annonces', name: 'app_all_annonces')]
    public function index(AnnoncesRepository $annoncesRepo, PaginatorInterface $paginator, Request $request): Response
    {
        $query = $request->getQueryString();
        $searchForm = $this->createForm(SearchFormType::class);
        $searchForm->handleRequest($request);

        if ($searchForm->isSubmitted() && $searchForm->isValid()) {
            $criteria = $searchForm->getData();
        }

        $annonces = $paginator->paginate(
            $annoncesRepo->search($criteria ?? []),
            $request->query->getInt('page', 1), 
            5, 
            array('pageParameterName' => 'page', 'distinct' => true, 'query' => $query)
        );

        return $this->render('all_annonces/index.html.twig', [
            'controller_name' => 'AllAnnoncesController',
            'annonces' => $annonces,
            'searchForm' => $searchForm->createView(),
        ]);
    }
}