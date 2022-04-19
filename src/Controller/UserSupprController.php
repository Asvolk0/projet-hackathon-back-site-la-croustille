<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class UserSupprController extends AbstractController
{
    #[Route('/supprUser/{id}', name:'app_user_suppr', methods:['GET', 'POST'])]
    public function app_user_suppr(UserRepository $userRepository, $id){
        $user = $userRepository->findOneBy([
            'id'=>$id
        ]);

        $userRepository->remove($user);

        return $this->redirectToRoute('app_user');
    }
}
