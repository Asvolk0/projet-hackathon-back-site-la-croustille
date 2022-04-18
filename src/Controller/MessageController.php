<?php

namespace App\Controller;

use App\Entity\Message;
use App\Entity\User;
use App\Form\FormMessageType;
use App\Repository\MessageRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class MessageController extends AbstractController
{
    #[Route('/message', name: 'app_message', methods:['GET', 'POST'])]
    public function message(Request $request, MessageRepository $messageRepository, UserRepository $userRepository)
    {
        $message = new Message();
        $formMessage = $this->createForm(FormMessageType::class, $message);
        $formMessage->handleRequest($request);

        if ($formMessage->isSubmitted() && $formMessage->isValid()){
            $message->setUser($this->getUser());
            $messageRepository->add($message);


            return $this->redirectToRoute('homepage');
        }

        
        

        return $this->render('message/message.html.twig', [
            'formMessage'=>$formMessage->createView(),
            "message"=>$message
        ]);
    }
}
