<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class GroupementController extends AbstractController
{
    #[Route('/', name: 'app_groupement')]
    public function index(): Response
    {
        return $this->render('groupement/index.html.twig', [
            'controller_name' => 'GroupementController',
            'groupement_datas' => "groupements"
        ]);
    }
}
