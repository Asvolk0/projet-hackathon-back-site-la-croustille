<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/administrateur')]
class UserController extends AbstractController
{
    #[Route('/', name: 'app_user', methods:['GET', 'POST'])]
    public function app_user(UserRepository $userRepository)
    {
        $users = $userRepository->findAll();

        return $this->render('user/app_user.html.twig', [
            'users'=>$users
        ]);
    }

    #[Route('/{id}', name:'app_user_id', methods:['GET', 'POST'])]
    public function app_user_id(UserRepository $userRepository, $id){
        $user = $userRepository->findOneBy([
            'id'=>$id
        ]);

        return $this->render('user/app_user_id.html.twig', [
            'user'=>$user
        ]);
    }

    #[Route('/admin/{id}', name:'app_adminChang', methods:['GET', 'POST'])]
    public function app_adminChang($id, UserRepository $userRepository){
        $user = $userRepository->findOneBy([
            'id'=>$id
        ]);

        if ($user->getRoles() === ["ROLE_ADMIN"]){
            $user->setRoles(["ROLE_USER"]);
        }elseif ($user->getRoles() === ["ROLE_USER"]) {
            $user->setRoles(["ROLE_ADMIN"]);
        }

        $userRepository->add($user);

        return $this->redirectToRoute('app_user');
    }
}
