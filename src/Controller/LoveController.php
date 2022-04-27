<?php

namespace App\Controller;

use App\Repository\RecipeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/love')]
class LoveController extends AbstractController
{
    #[Route('/{id}', name:'love', methods:["GET", 'POST'])]
    public function love(RecipeRepository $recipeRepository, $id)
    {
        $recipe = $recipeRepository->findOneBy([
            'id'=>$id
        ]);

        if ($recipe->getUsers()->contains($this->getUser()) == true) {
           $recipe->removeUser($this->getUser()); 
        }else{
            $recipe->addUser($this->getUser());
        }

        $recipeRepository->add($recipe);

        return $this->redirectToRoute('homepage');
    }
}
