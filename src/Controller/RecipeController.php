<?php

namespace App\Controller;

use App\Repository\RecipeRepository;
use App\Repository\TypeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class RecipeController extends AbstractController
{
    #[Route('/recettes/{name}', name: 'recipes', methods:['GET', 'POST'])]
    public function recipes(TypeRepository $typeRepository, $name, RecipeRepository $recipeRepository)
    {
        $type = $typeRepository->findOneBy([
            'name'=>$name
        ]);

        $recipes = $recipeRepository->findBy([
            'type'=>$type->getId()
        ]);

        return $this->render('recipe/recipes.html.twig', [
            'type'=>$type,
            'recipe'=>$recipes
        ]);
    }
}
