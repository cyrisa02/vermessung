<?php

namespace App\Controller;

use App\Entity\Provider;
use App\Form\ProviderType;
use App\Repository\ProviderRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/lieferant')]
class ProviderController extends AbstractController
{
    #[Route('/', name: 'app_providermob_index', methods: ['GET'])]
    public function indexmob(ProviderRepository $providerRepository): Response
    {
        return $this->render('pages/provider/indexmobile.html.twig', [
            'providers' => $providerRepository->findAll(),
        ]);
    }

    #[Route('/', name: 'app_provider_index', methods: ['GET'])]
    public function index(ProviderRepository $providerRepository): Response
    {
        return $this->render('pages/provider/index.html.twig', [
            'providers' => $providerRepository->findAll(),
        ]);
    }

    #[Route('/neu', name: 'app_provider_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ProviderRepository $providerRepository): Response
    {
        $provider = new Provider();
        $form = $this->createForm(ProviderType::class, $provider);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $providerRepository->save($provider, true);
            $this->addFlash('success', 'Die Änderung wurde erfolgreich abgeschlossen');

            return $this->redirectToRoute('app_providermob_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('pages/provider/new.html.twig', [
            'provider' => $provider,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_provider_show', methods: ['GET'])]
    public function show(Provider $provider): Response
    {
        return $this->render('pages/provider/show.html.twig', [
            'provider' => $provider,
        ]);
    }

    #[Route('/{id}/andern', name: 'app_provider_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Provider $provider, ProviderRepository $providerRepository): Response
    {
        $form = $this->createForm(ProviderType::class, $provider);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $providerRepository->save($provider, true);
            $this->addFlash('success', 'Die Änderung wurde erfolgreich abgeschlossen');
            return $this->redirectToRoute('app_providermob_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('pages/provider/edit.html.twig', [
            'provider' => $provider,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_provider_delete', methods: ['POST'])]
    public function delete(Request $request, Provider $provider, ProviderRepository $providerRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$provider->getId(), $request->request->get('_token'))) {
            $providerRepository->remove($provider, true);
        }

        return $this->redirectToRoute('app_providermob_index', [], Response::HTTP_SEE_OTHER);
    }
}