<?php

namespace App\Controller;

use App\Repository\RecipeRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/like')]
class LikeController extends AbstractController
{
    #[Route('/{id}', name: 'like')]
    public function like(RecipeRepository $recipeRepository, $id, UserRepository $userRepository)
    {
        $recipe = $recipeRepository->findOneBy([
            'id'=>$id
        ]);

        $userRepository->findOneBy([
            'id'=>$this->getUser()
        ]);

        $recipeRepository->findBy([
            'active'=>true
        ]);

        dd($recipe->addUser($this->getUser()));

        if ($recipe->getUsers()->contains($this->getUser())) {
           $recipe->removeUser($this->getUser()); 
        }else{
            $recipe->addUser($this->getUser());
        }

        $recipeRepository->add($recipe);

        return $this->redirectToRoute('recipes');
    }
}
