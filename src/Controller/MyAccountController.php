<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MyAccountController extends AbstractController
{
    #[Route('/mon_compte', name: 'app_my_account')]
    public function app_my_account()
    {
        return $this->render('myaccount/myaccount.html.twig', [
        ]);
    }
}
