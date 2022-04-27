<?php

namespace App\Controller;

use App\Entity\Step;
use App\Entity\Type;
use App\Entity\User;
use App\Repository\IngredientsRepository;
use App\Repository\RecipeRepository;
use App\Repository\StepRepository;
use App\Repository\TypeRepository;
use App\Repository\UnityRepository;
use App\Repository\UserRepository;
use Doctrine\DBAL\Types\TypeRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;

#[Route('/recettes')]
class RecipeController extends AbstractController
{
    #[Route('/{name}', name: 'recipes', methods:['GET', 'POST'])]
    public function recipes(TypeRepository $typeRepository, $name, RecipeRepository $recipeRepository, Request $request, PaginatorInterface $paginator)
    {
        $type = $typeRepository->findOneBy([
            'name'=>$name
        ]);

        $data = $recipeRepository->findBy([
            'type'=>$type->getId()
        ]);

        $recipes = $paginator->paginate(
            $data, $request->query->getInt('page', 1), 6
        );

        return $this->render('recipe/recipes.html.twig', [
            'type'=>$type,
            'recipes'=>$recipes
        ]);
    }

    #[Route('/{name}/{title}/{id}', name:'showRecipe', methods:['GET', 'POST'])]
    public function showRecipe($id, $name, TypeRepository $typeRepository, RecipeRepository $recipeRepository, StepRepository $stepRepository, IngredientsRepository $ingredientsRepository){
        $type = $typeRepository->findOneBy([
            'name'=>$name,
        ]);

        $recipe = $recipeRepository->findOneBy([
            'id'=>$id
        ]);

        $steps = $stepRepository->findBy([
            'recipe'=>$id
        ], 
        [
            'id'=>'ASC'
        ]);

        $ingredients = $ingredientsRepository->findBy([
            'recipe'=>$id
        ],
        [
            'id'=>'ASC'
        ]);

        return $this->render('recipe/showRecipe.html.twig', [
            'type'=>$type,
            'recipe'=>$recipe,
            'steps'=>$steps,
            'ingredients'=>$ingredients
        ]);
    }
}
