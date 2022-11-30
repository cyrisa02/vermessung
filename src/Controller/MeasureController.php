<?php

namespace App\Controller;

use App\Entity\Measure;
use App\Form\MeasureType;
use App\Service\FileUploader;
use App\Repository\MeasureRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/vermessung')]
class MeasureController extends AbstractController
{
    #[Route('/', name: 'app_measure_index', methods: ['GET'])]
    public function index(MeasureRepository $measureRepository): Response
    {
        return $this->render('pages/measure/index.html.twig', [
            'measures' => $measureRepository->findAll(),
        ]);
    }

    #[Route('/neu', name: 'app_measure_new', methods: ['GET', 'POST'])]
    public function new(Request $request, MeasureRepository $measureRepository, FileUploader $fileUploader): Response
    {
        $measure = new Measure();
        $form = $this->createForm(MeasureType::class, $measure);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $imageFile = $form->get('picture')->getData();
            if ($imageFile) {
            $imageFileName = $fileUploader->upload($imageFile);
            $measure->setPicture($imageFileName);
        }
            $measureRepository->save($measure, true);
            $this->addFlash('success', ' Die Änderung wurde erfolgreich abgeschlossen');
            return $this->redirectToRoute('app_measure_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('pages/measure/new.html.twig', [
            'measure' => $measure,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_measure_show', methods: ['GET'])]
    public function show(Measure $measure): Response
    {
        return $this->render('pages/measure/show.html.twig', [
            'measure' => $measure,
        ]);
    }

    #[Route('/{id}/andern', name: 'app_measure_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Measure $measure, MeasureRepository $measureRepository, FileUploader $fileUploader): Response
    {
        $form = $this->createForm(MeasureType::class, $measure);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $imageFile = $form->get('picture')->getData();
            if ($imageFile) {
            $imageFileName = $fileUploader->upload($imageFile);
            $measure->setPicture($imageFileName);
        }
            $measureRepository->save($measure, true);
            $this->addFlash('success', ' Die Änderung wurde erfolgreich abgeschlossen');
            return $this->redirectToRoute('app_measure_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('pages/measure/edit.html.twig', [
            'measure' => $measure,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_measure_delete', methods: ['POST'])]
    public function delete(Request $request, Measure $measure, MeasureRepository $measureRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$measure->getId(), $request->request->get('_token'))) {
            $measureRepository->remove($measure, true);
        }

        return $this->redirectToRoute('app_measure_index', [], Response::HTTP_SEE_OTHER);
    }
}