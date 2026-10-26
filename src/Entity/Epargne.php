<?php

namespace App\Entity;

use App\Repository\EpargneRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EpargneRepository::class)]
class Epargne extends Campagne
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $objectifEpargne = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getObjectifEpargne(): ?int
    {
        return $this->objectifEpargne;
    }

    public function setObjectifEpargne(int $objectifEpargne): static
    {
        $this->objectifEpargne = $objectifEpargne;

        return $this;
    }
}
