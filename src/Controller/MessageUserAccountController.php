<?php

namespace App\Controller;

use App\Repository\MessageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/mon_compte')]
class MessageUserAccountController extends AbstractController
{
    #[Route('/messages_utilisateurs', name: 'app_message_user_account')]
    public function app_message_user_account(MessageRepository $messageRepository)
    {
        $messages = $messageRepository->findAll();

        return $this->render('messageUserAccount/messageUserAccount.html.twig', [
            'messages'=>$messages
        ]);
    }

    #[Route('/messages_utilisateurs/{id}', name:'app_message_user_account_id', methods:['GET', 'POST'])]
    public function app_message_user_account_id(MessageRepository $messageRepository, $id){
        $message = $messageRepository->findOneBy([
            'id'=>$id
        ]);

        return $this->render('messageUserAccount/messageUserAccountId.html.twig', [
            'message'=>$message
        ]);
    }
}
