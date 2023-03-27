<?php

namespace App\Controller;

use App\Repository\AnnoncesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AllAnnoncesController extends AbstractController
{
    #[Route('/annonces', name: 'app_all_annonces')]
    public function index(AnnoncesRepository $annoncesRepo): Response
    {
        $annonces = $annoncesRepo->findAll();
        return $this->render('all_annonces/index.html.twig', [
            'controller_name' => 'AllAnnoncesController',
            'annonces' => $annonces,
        ]);
    }
}
