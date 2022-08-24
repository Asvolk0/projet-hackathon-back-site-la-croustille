<?php

namespace App\Controller;

use App\Repository\RecipeRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomepageController extends AbstractController
{
    #[Route('/', name: 'homepage')]
    public function homepage(RecipeRepository $recipeRepository, UserRepository $userRepository)
    {
        $user = $userRepository->findAll();

        $recipeLike = $recipeRepository->findBy([

        ],
        [
            'title'=>'DESC'
        ]);

        $recipeFav = $recipeRepository->findBy([

        ],
        [
            'title'=>'ASC'
        ]);

        return $this->render('homepage/homepage.html.twig', [
            'recipeFav'=>$recipeFav,
            'recipeLike'=>$recipeLike,
            'user'=>$user
        ]);
    }
}
