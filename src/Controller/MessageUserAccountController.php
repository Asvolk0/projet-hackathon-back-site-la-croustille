<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MessageUserAccountController extends AbstractController
{
    #[Route('/message/user/account', name: 'app_message_user_account')]
    public function index(): Response
    {
        return $this->render('message_user_account/index.html.twig', [
            'controller_name' => 'MessageUserAccountController',
        ]);
    }
}
