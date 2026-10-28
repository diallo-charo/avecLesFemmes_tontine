<?php

namespace App\Entity;

use App\Enum\StatusExercice;
use App\Repository\ExerciceRepository;
use App\Traits\DateTimeTrait;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExerciceRepository::class)]
class Exercice
{
    use DateTimeTrait;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $nom = null;

    #[ORM\Column]
    private ?\DateTime $dateDebut = null;

    #[ORM\Column]
    private ?\DateTime $dateFinAt = null;

    #[ORM\Column]
    private ?\DateTime $dateRestribution = null;

    #[ORM\ManyToOne(inversedBy: 'exercices')]
    private ?Groupement $groupement = null;

    #[ORM\Column(enumType: StatusExercice::class)]
    private ?StatusExercice $status = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getDateDebut(): ?\DateTime
    {
        return $this->dateDebut;
    }

    public function setDateDebut(\DateTime $dateDebut): static
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    public function getDateFinAt(): ?\DateTime
    {
        return $this->dateFinAt;
    }

    public function setDateFinAt(\DateTime $dateFinAt): static
    {
        $this->dateFinAt = $dateFinAt;

        return $this;
    }

    public function getDateRestribution(): ?\DateTime
    {
        return $this->dateRestribution;
    }

    public function setDateRestribution(\DateTime $dateRestribution): static
    {
        $this->dateRestribution = $dateRestribution;

        return $this;
    }

    public function getGroupement(): ?Groupement
    {
        return $this->groupement;
    }

    public function setGroupement(?Groupement $groupement): static
    {
        $this->groupement = $groupement;

        return $this;
    }

    public function getStatus(): ?StatusExercice
    {
        return $this->status;
    }

    public function setStatus(StatusExercice $status): static
    {
        $this->status = $status;

        return $this;
    }
}
