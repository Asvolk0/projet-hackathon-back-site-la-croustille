<?php

namespace App\Controller;

use App\Entity\Recipe;
use App\Entity\Step;
use App\Form\FormRecipeType;
use App\Form\FormStepType;
use App\Repository\RecipeRepository;
use App\Repository\StepRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AddRecipeController extends AbstractController
{
    #[Route('/ajouter_une_recette', name: 'app_add_recipe')]
    public function app_add_recipe(Request $request, RecipeRepository $recipeRepository)
    {
        $recipe = new Recipe();

        $formRecipe = $this->createForm(FormRecipeType::class, $recipe);
        $formRecipe->handleRequest($request);

        if ($formRecipe->isSubmitted() && $formRecipe->isValid()){
            $img = $formRecipe->get('img')->getData();
            $imgName = md5(uniqid()) . '.' . $img->guessExtension();
            $img->move($this->getParameter('uploadDirectory'), $imgName);
            $recipe->setActive(true);

            $request->query->get('nomDuChampForm'); // récup par get
            $request->request->get('nomDuChampForm'); // récup par post


            $recipeRepository->add($recipe);

            return $this->redirectToRoute('homepage');
        }


        return $this->render('recipe/addRecipe.html.twig', [
            'formRecipe'=>$formRecipe->createView()
        ]);
    }
}
