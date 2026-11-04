<?php

namespace App\Controller;

use App\Repository\GroupementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class GroupementController extends AbstractController
{

    public function __construct(private readonly GroupementRepository $groupementRepository)
    {
    }

    #[Route('/groupement', name: 'app_groupement')]
    public function index(): Response
    {
        $groupements = $this->groupementRepository->findAllGroupementWithExerciceEncours();
        dd($groupements);
        return $this->render('groupement/index.html.twig', [
            'controller_name' => 'GroupementController',
            'groupement_datas' => $groupements
        ]);
    }
}
