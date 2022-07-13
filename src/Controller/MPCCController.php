<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MPCCController extends AbstractController
{
    #[Route('/MentionLegales', name: 'MentionLegales')]
    public function MentionLegales(): Response
    {
        return $this->render('MPCC/MentionsLegales.html.twig');
    }

    #[Route('/PolitiqueDeConfidentialite', name: 'PolitiqueDeConfidentialite')]
    public function PolitqueDeConfidentialite(): Response
    {
        return $this->render('MPCC/PolitiqueDeConfidentialite.html.twig');
    }

    #[Route('/CGU', name: 'CGU')]
    public function CGU(): Response
    {
        return $this->render('MPCC/CGU.html.twig');
    }

    #[Route('/Charte', name: 'charte')]
    public function Charte(): Response
    {
        return $this->render('MPCC/Charte.html.twig');
    }
}
