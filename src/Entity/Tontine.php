<?php

namespace App\Entity;

use App\Repository\TontineRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TontineRepository::class)]
class Tontine extends Campagne
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $montantCotisation = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMontantCotisation(): ?int
    {
        return $this->montantCotisation;
    }

    public function setMontantCotisation(int $montantCotisation): static
    {
        $this->montantCotisation = $montantCotisation;

        return $this;
    }
}
