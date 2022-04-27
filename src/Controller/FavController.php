<?php

namespace App\Controller;

use App\Repository\RecipeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/favoris')]
class FavController extends AbstractController
{
    #[Route('/{id}', name: 'fav')]
    public function fav(RecipeRepository $recipeRepository, $id)
    {
        $recipe = $recipeRepository->findOneBy([
            'id'=>$id
        ]);

        if ($recipe->getFav()->contains($this->getUser()) == true) {
           $recipe->removeFav($this->getUser()); 
        }else{
            $recipe->addFav($this->getUser());
        }

        $recipeRepository->add($recipe);

        return $this->redirectToRoute('homepage');
    }
}
