<?php
namespace App\Entity\enum;

enum StatusExercice: string {
    case ENCOURS = "En_cours";
    case TERMINER = "Terminer";

    public function getLabel(): string {
        return match($this) {
            self::ENCOURS => "En_cours",
            self::TERMINER => "Terminer",
        };
    }
}