<?php

namespace App\Controller;

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
        $annonces = $annoncesRepo->findAll();

        $annonces = $paginator->paginate(
            $annonces, /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            5 /*limit per page*/ );

        return $this->render('all_annonces/index.html.twig', [
            'controller_name' => 'AllAnnoncesController',
            'annonces' => $annonces,
        ]);
    }
}
