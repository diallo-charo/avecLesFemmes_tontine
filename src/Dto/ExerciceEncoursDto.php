<?php
namespace App\Dto;
use App\Entity\Exercice;

class ExerciceEncoursDto{
    
    public function __construct(
        public readonly int $id,
        public readonly string $nom,
        public readonly \DateTime $dateDebut,
        public readonly \DateTime $dateFinAt,
        public readonly \DateTime $dateRestribution,
        public readonly string $status
    ) {
    }

    public static function entityToDto(Exercice $exercice) {
        return new self(
            $exercice->getId(),
            $exercice->getNom(),
            $exercice->getDateDebut(),
            $exercice->getDateFinAt(),
            $exercice->getDateRestribution(),
            $exercice->getStatus()->getLabel()
        );
    }

    

    
}