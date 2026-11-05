<?php
namespace App\Service;

use App\Dto\ExerciceEncoursDto;
use App\Dto\ListeGroupementDto;
use App\Repository\GroupementRepository;

class GroupementService {
    public function __construct(private readonly GroupementRepository $repo)
    {
        
    }

    public function getAllGroupement() {
        return $this->repo->findAll();
    }

    public function getGroupementById(int $id) {
        return $this->repo->find($id);
    }

    public function getGroupementByName(string $name) {
        return $this->repo->findOneBy(['nom' => $name]);
    }

    public function findAllGroupementAndExcerciceEncours():array{
        //le mappage de l'entity vers dto se fera ici
        $groupements = $this->repo->findAllGroupementWithExerciceEncours();
        $resultat = array_map(function($groupement){
            $exerciceEncours = $groupement->getExercices()[0] ?? null;
            if($exerciceEncours){
                $exerciceEncours = ExerciceEncoursDto::entityToDto($exerciceEncours);
                return ListeGroupementDto::fromEntity($groupement,$exerciceEncours);
            }
            return null;
        },$groupements);
        return $resultat;
    }
}