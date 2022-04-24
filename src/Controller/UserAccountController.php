<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\FormUserType;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/mon_compte')]
class UserAccountController extends AbstractController
{
    #[Route('/modifierMesInformations/{id}', name: 'app_user_account', methods:['GET', 'POST'])]
    public function app_user_account($id, UserRepository $userRepository, Request $request, UserPasswordHasherInterface $userPasswordHasher)
    {
        $user = $userRepository->findOneBy([
            'id'=>$id
        ]);

        $formUserAccount = $this->createForm(FormUserType::class, $user);
        $formUserAccount->handleRequest($request);


        if ($formUserAccount->isSubmitted() && $formUserAccount->isValid()){
            $user
                ->setPassword(
            $userPasswordHasher->hashPassword(
                    $user,
                    $formUserAccount->get('plainPassword')->getData()
                )
            );
            
            $userRepository->add($user);

            return $this->redirectToRoute('app_my_account');
        }

        return $this->render('user/app_user_account.html.twig', [
            'formUserAccount'=>$formUserAccount->createView(),
            'user'=>$user
        ]);
    }
}
