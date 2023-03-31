<?php

namespace App\Controller;
use App\Entity\Réponses;
use App\Form\CommentaireType;
use App\Repository\AnnoncesRepository;
use App\Repository\RéponsesRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AnnonceController extends AbstractController
{
    #[Route('/annonce/{id}', name: 'app_annonce_show', methods: ['GET','POST'])]
    public function index(AnnoncesRepository $annonceRepo,Request $request, $id ,RéponsesRepository $reponseRepo ): Response
    {
        $annonce = $annonceRepo->find($id);

        $reponseEntity = new Réponses();
        $form = $this->createForm(CommentaireType::class, $reponseEntity);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $reponseEntity->setAnnonceId($annonce);
            $reponseRepo->save($reponseEntity, true);

            return $this->redirectToRoute('app_annonce_show', ['id' => $id], Response::HTTP_SEE_OTHER);
        }

        return $this->render('annonce/index.html.twig', [
            'controller_name' => 'AnnonceController',
            'annonce' => $annonce,
            'commentaireForm' => $form,
        ]);
    }
}


