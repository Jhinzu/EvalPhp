<?php

namespace App\Controller\Admin;

use App\Entity\Annonces;
use App\Form\AnnoncesType;
use App\Repository\AnnoncesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/annonces')]
class AnnoncesController extends AbstractController
{
    #[Route('/', name: 'app_admin_annonces_index', methods: ['GET'])]
    public function index(AnnoncesRepository $annoncesRepository): Response
    {
        return $this->render('admin/annonces/index.html.twig', [
            'annonces' => $annoncesRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_admin_annonces_new', methods: ['GET', 'POST'])]
    public function new(Request $request, AnnoncesRepository $annoncesRepository): Response
    {
        $annonce = new Annonces();
        $form = $this->createForm(AnnoncesType::class, $annonce);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $annoncesRepository->save($annonce, true);

            return $this->redirectToRoute('app_admin_annonces_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/annonces/new.html.twig', [
            'annonce' => $annonce,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_annonces_show', methods: ['GET'])]
    public function show(Annonces $annonce): Response
    {
        return $this->render('admin/annonces/show.html.twig', [
            'annonce' => $annonce,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_admin_annonces_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Annonces $annonce, AnnoncesRepository $annoncesRepository): Response
    {
        $form = $this->createForm(AnnoncesType::class, $annonce);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $annoncesRepository->save($annonce, true);

            return $this->redirectToRoute('app_admin_annonces_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/annonces/edit.html.twig', [
            'annonce' => $annonce,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_annonces_delete', methods: ['POST'])]
    public function delete(Request $request, Annonces $annonce, AnnoncesRepository $annoncesRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$annonce->getId(), $request->request->get('_token'))) {
            $annoncesRepository->remove($annonce, true);
        }

        return $this->redirectToRoute('app_admin_annonces_index', [], Response::HTTP_SEE_OTHER);
    }
}
