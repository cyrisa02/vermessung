<?php

namespace App\Controller;

use App\Entity\Quotation;
use App\Form\QuotationType;
use App\Service\MailService;
use App\Repository\QuotationRepository;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/preisangebot')]
class QuotationController extends AbstractController
{
    #[Route('/', name: 'app_quotation_index', methods: ['GET'])]
    public function index(QuotationRepository $quotationRepository): Response
    {
      

        return $this->render('pages/quotation/index.html.twig', [
            'quotations' => $quotationRepository->findAll(),
        ]);
    }

    #[Route('/neu', name: 'app_quotation_new', methods: ['GET', 'POST'])]
    public function new(Request $request, QuotationRepository $quotationRepository): Response
    {
        $quotation = new Quotation();
        $form = $this->createForm(QuotationType::class, $quotation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $quotationRepository->save($quotation, true);
            $this->addFlash('success', 'Die Änderung wurde erfolgreich abgeschlossen');

            return $this->redirectToRoute('app_quotation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('pages/quotation/new.html.twig', [
            'quotation' => $quotation,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_quotation_show', methods: ['GET'])]
    public function show(Quotation $quotation): Response
    {
        return $this->render('pages/quotation/show.html.twig', [
            'quotation' => $quotation,
        ]);
    }

    #[Route('/{id}/senden', name: 'app_quotation_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Quotation $quotation, QuotationRepository $quotationRepository, MailerInterface $mailer ): Response
    {
        $form = $this->createForm(QuotationType::class, $quotation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $quotationRepository->save($quotation, true);
            
            $email = (new TemplatedEmail())
            ->from('cyril.gourdon.02@gmail.com')
            //->to('cyrisa02.test@gmail.com')
            ->to($quotation->getMeasure()->getProviders()->getEmail())
            ->subject('Preisangebot')
            ->htmlTemplate('emails/answer.html.twig')
            ->context([
            'quotation'=>$quotation
            ]);
            $mailer->send($email);

            $this->addFlash('success', 'Ihre E-Mail wurde an dem Lieferant gesendet.');
            return $this->redirectToRoute('app_yourmeasuremob_index', [], Response::HTTP_SEE_OTHER);
        }

        
        return $this->renderForm('pages/quotation/edit.html.twig', [
            'quotation' => $quotation,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_quotation_delete', methods: ['POST'])]
    public function delete(Request $request, Quotation $quotation, QuotationRepository $quotationRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$quotation->getId(), $request->request->get('_token'))) {
            $quotationRepository->remove($quotation, true);
        }

        return $this->redirectToRoute('app_quotation_index', [], Response::HTTP_SEE_OTHER);
    }
}