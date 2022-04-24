<?php

namespace App\Controller;

use App\Entity\Recipe;
use App\Repository\RecipeRepository;
use App\Repository\StepRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/administrateur')]
class AddRecipeController extends AbstractController
{
    #[Route('/ajouterUneRecette', name: 'app_add_recipe')]
    public function app_add_recipe(Request $request, RecipeRepository $recipeRepository, StepRepository $stepRepository)
    {
        $recipe = new Recipe();

        
        if ($request->request->get('title') && $request->request->get('img') &&
        $request->request->get('type') && $request->request->get('stepFirst')){
            $step['stepFirst'] = $request->request->get('stepFirst');
            $step['stepSecond'] = $request->request->get('stepSecond');
            $step['stepThree'] = $request->request->get('stepThree');
            $step['stepFour'] = $request->request->get('stepFour');

            $recipes['title'] = $request->request->get('title');
            $recipes['img'] = $request->request->get('img');

            $type = $request->request->get('type');

            dd($type, $recipe->setTitle($recipes['title'])
                            ->setImg($recipes['img'])
                            // ->addStep($step)
                            ->setActive(true));


            $recipe->setTitle($recipes['title'])
                   ->setImg($recipes['img'])
                   ->setType($recipes['type'])
                   ->setActive(true);


            $recipeRepository->add($recipe);

            
            
            dd($recipes, $step, $recipe);
        }  

        return $this->render('recipe/addRecipe.html.twig');
    }
}
