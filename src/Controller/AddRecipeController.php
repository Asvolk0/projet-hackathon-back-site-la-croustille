<?php

namespace App\Controller;

use App\Entity\Ingredients;
use App\Entity\Recipe;
use App\Entity\Step;
use App\Entity\Type;
use App\Entity\Unity;
use App\Repository\RecipeRepository;
use App\Repository\StepRepository;
use App\Repository\TypeRepository;
use App\Repository\UnityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/administrateur')]
class AddRecipeController extends AbstractController
{
    #[Route('/ajouterUneRecette', name: 'app_add_recipe')]
    public function app_add_recipe(Request $request, TypeRepository $typeRepository, ManagerRegistry $doctrine, UnityRepository $unityRepository)
    {
        $entityManager = $doctrine->getManager();

        $recipe = new Recipe();

        $types = $typeRepository->findBy([], ['name' => 'DESC']);

        $unityMesure = $unityRepository->findBy([], ['id' => 'DESC']);

        if (!empty($request->request->all()))
        {
            $stepForm['stepFirst'] = $request->request->get('stepFirst');
            $stepForm['stepSecond'] = $request->request->get('stepSecond');
            $stepForm['stepThree'] = $request->request->get('stepThree');
            $stepForm['stepFour'] = $request->request->get('stepFour');

            $IngredientForm['IngredientOne'] = $request->request->get('IngredientOne');
            $IngredientForm['quantity'] = $request->request->get('quantity');

            $recipes['title'] = $request->request->get('title');
            $recipes['nbPersonne'] = $request->request->get('nbPersonne');
            $recipes['unity'] = $request->request->get('unity');
            $recipes['preparationTime'] = $request->request->get('preparationTime');
            $img = $request->files->get('img');
            $imgName = md5(uniqid()) . '.' .$img->guessExtension();
            $img->move($this->getParameter('uploadDirectory'), $imgName);

            $recipe->setTitle($recipes['title'])
                   ->setPreparationTime($recipes['preparationTime'])
                   ->setNbPersonne($recipes['nbPersonne'])
                   ->setImg($imgName)
                   ->setActive(true)
                   ->setType($typeRepository->findOneBy(['id' => $request->request->get('type')]));

            foreach ($stepForm as $step){
                $newStep = new Step();

                $newStep->setSteps($step);

                $recipe->addStep($newStep);
                $entityManager->persist($newStep);
            }

            $newIngredient = new Ingredients();

            
            $newIngredient->setIngredient($IngredientForm['IngredientOne'])
            ->setQuantity($IngredientForm['quantity'])
            ->setUnity($unityRepository->findOneBy([
                'id'=>$recipes['unity']
            ]));
            
            $recipe->addIngredient($newIngredient);
            
            $entityManager->persist($recipe);
            $entityManager->persist($newIngredient);
            $entityManager->flush();

            return $this->redirectToRoute('addIngredient');
        }

        return $this->render('recipe/addRecipe.html.twig', [
            'types' => $types,
            'unityMesure'=>$unityMesure
        ]);
    }

    #[Route('/ajouterUnIngredient', name:'addIngredient', methods:['GET', 'POST'])]
    public function addIngredient(RecipeRepository $recipeRepository, Request $request, ManagerRegistry $doctrine, UnityRepository $unityRepository){

        $entityManager = $doctrine->getManager();
        
        $recipes = $recipeRepository->findBy([

        ],
            ['id' => 'DESC'
        ]);

        $unityMesure = $unityRepository->findBy([], ['id' => 'DESC']);

        
        if (!empty($request->request->all())){
            $newIngredient = new Ingredients();
            
            $IngredientForm['Ingredient'] = $request->request->get('Ingredient');
            $IngredientForm['quantity'] = $request->request->get('quantity');
            
            $newIngredient->setIngredient($IngredientForm['Ingredient'])
            ->setQuantity($IngredientForm['quantity'])
            ->setUnity($unityRepository->findOneBy([
                'id'=>$request->request->get('unity')
                ]))
                ->setRecipe($recipeRepository->findOneBy([
                    'id'=>$request->request->get('recipe')
                ]));
                
            $entityManager->persist($newIngredient);
            $entityManager->flush();

            return $this->redirectToRoute('redirectIngredient');
        }

        
        return $this->render('recipe/addIngredient.html.twig', [
            'recipes'=>$recipes,
            'unityMesure'=>$unityMesure
        ]);
    }

    #[Route('/ajouterUnAutreIngredient', name:'redirectIngredient', methods:['GET', 'POST'])]
    public function redirectIngredient(){

        return $this->render('recipe/redirectIngredient.html.twig');
    }
}
