<?php
namespace App\Service;

class ListeGroupementDto {

    public function __construct(
        public readonly string $nom,
        public readonly string $dateDebut,
        public readonly string $dateFin,
        public readonly string $type,
    ) {

    }

    public static function entityToDto( $groupement) {
        // A Implementer pour convertir un entity Groupement en ListeGroupementDto
        return null;
    }

    public static function entitiesToDtos($groupements) {
        // A Implementer pour convertir un tableau d'entity Groupement en tableau de ListeGroupementDto
        return null;
    }
}