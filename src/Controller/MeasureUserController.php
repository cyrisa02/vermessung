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

/**
 * This Controller allows to display the measures for one single craftsman
 */


#[Route('/personal_vermessung')]
class MeasureUserController extends AbstractController
{
    #[Route('/', name: 'app_yourmeasure_index', methods: ['GET'])]
    public function index(MeasureRepository $measureRepository): Response
    {
        /** @var User $user */
        $user = $this->getUser();
        

        return $this->render('pages/measure/indexforuser.html.twig', [
            'measures' => $measureRepository->findByUser($user),
        ]);
    }

    
}