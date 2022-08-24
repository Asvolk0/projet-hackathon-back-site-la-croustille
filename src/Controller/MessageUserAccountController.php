<?php

namespace App\Controller;

use App\Entity\Use;
use App\Entity\User;
use App\Repository\MessageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/messagesUtilisateurs')]
class MessageUserAccountController extends AbstractController
{
    #[Route('/', name: 'app_message_user_account')]
    public function app_message_user_account(MessageRepository $messageRepository)
    {
        $messages = $messageRepository->findAll();

        return $this->render('messageUserAccount/messageUserAccount.html.twig', [
            'messages'=>$messages
        ]);
    }

    #[Route('/{id}', name:'app_message_user_account_id', methods:['GET', 'POST'])]
    public function app_message_user_account_id(MessageRepository $messageRepository, $id){
        $message = $messageRepository->findOneBy([
            'id'=>$id
        ]);

        return $this->render('messageUserAccount/messageUserAccountId.html.twig', [
            'message'=>$message
        ]);
    }

    #[Route('/supprMessage/{id}', name:'app_message_user_account_suppr', methods:['GET', 'POST'])]
    public function app_message_user_account_suppr(MessageRepository $messageRepository, $id){
        $message = $messageRepository->findOneBy([
            'id'=>$id
        ]);

        $messageRepository->remove($message);

        return $this->redirectToRoute('app_message_user_account');
    }
}
