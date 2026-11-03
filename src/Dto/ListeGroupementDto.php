<?php
namespace App\Dto;

use App\Dto\ExerciceEncoursDto as DtoExerciceEncoursDto;
use App\Entity\Groupement;

class ListeGroupementDto {

    public function __construct(
        public readonly string $nom,
        public readonly string $telephone,
        public readonly string $adresse,
        public readonly DtoExerciceEncoursDto $exerciceEncours,
    ) {

    }

    public static function fromEntity( Groupement $groupement,DtoExerciceEncoursDto $exerciceEncours): self {
        // A Implementer pour convertir un entity Groupement en ListeGroupementDto
        return new self(
            $groupement->getNom(),
            $groupement->getTelephone(),
            $groupement->getAdresse(),
            $exerciceEncours
        );
    }

}