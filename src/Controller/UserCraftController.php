<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/craft')]
class UserCraftController extends AbstractController
{

    #[Route('/', name: 'app_user_index1', methods: ['GET'])]
    public function index(UserRepository $userRepository): Response
    {
        return $this->render('pages/user/index.html.twig', [
            'users' => $userRepository->findAll(),
        ]);
    }
   
    /**
     * This method allows to dysplay the profile for the logged craftsman
     */

    #[Route('/{id}', name: 'app_usercraf_show', methods: ['GET'])]
    public function showcraft(User $user): Response
    {
        return $this->render('pages/user/showcraft.html.twig', [
            'user' => $user,
        ]);
    }
    
    
}