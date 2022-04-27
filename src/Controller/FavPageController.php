<?php

namespace App\Controller;

use App\Repository\RecipeRepository;
use App\Repository\TypeRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/monCompte')]
class FavPageController extends AbstractController
{
    #[Route('/pageFavoris', name: 'favPage')]
    public function favPage(RecipeRepository $recipeRepository, UserRepository $userRepository, TypeRepository $typeRepository)
    {
        $recipes = $recipeRepository->findBy([
            'active'=>true
        ]);

        $types = $typeRepository->findAll();

        return $this->render('favoris/favPage.html.twig', [
            'recipes'=>$recipes,
            'types'=>$types
        ]);
    }
}
