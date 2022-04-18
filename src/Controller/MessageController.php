<?php

namespace App\Controller;

use App\Entity\Message;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MessageController extends AbstractController
{
    #[Route('/message', name: 'app_message', methods:['GET', 'POST'])]
    public function message()
    {
        $message = new Message();


        return $this->render('message/message.html.twig', [
        ]);
    }
}
