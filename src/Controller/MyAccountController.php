<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/monCompte')]
class MyAccountController extends AbstractController
{
    #[Route('/', name: 'app_my_account')]
    public function app_my_account()
    {
        return $this->render('myaccount/myaccount.html.twig', [
        ]);
    }
}
