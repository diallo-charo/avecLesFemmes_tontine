<?php
namespace App\Service;

use App\Entity\Exercice;
use App\Entity\Groupement;

class ListeGroupementDto {

    public function __construct(
        public readonly string $nom,
        public readonly string $telephone,
        public readonly string $adresse,
        public readonly ,
    ) {

    }

    public static function entityToDto( Groupement $groupement,Exercice $exercice) {
        // A Implementer pour convertir un entity Groupement en ListeGroupementDto
        return new self(
            $groupement->getNom(),
            $groupement->get
        );
    }

    public static function entitiesToDtos($groupements) {
        // A Implementer pour convertir un tableau d'entity Groupement en tableau de ListeGroupementDto
        return null;
    }
}