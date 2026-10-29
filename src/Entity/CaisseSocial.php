<?php

namespace App\Entity;

use App\Repository\CaisseSocialRepository;
use App\Traits\DateTimeTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CaisseSocialRepository::class)]
class CaisseSocial
{
    use DateTimeTrait;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $montant = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $dateAt = null;

    /**
     * @var Collection<int, Membre>
     */
    #[ORM\OneToMany(targetEntity: Membre::class, mappedBy: 'caisseSocial', orphanRemoval: true)]
    private Collection $membres;

    public function __construct()
    {
        $this->membres = new ArrayCollection();
         $this->initDate();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMontant(): ?int
    {
        return $this->montant;
    }

    public function setMontant(int $montant): static
    {
        $this->montant = $montant;

        return $this;
    }

    public function getDateAt(): ?\DateTimeImmutable
    {
        return $this->dateAt;
    }

    public function setDateAt(\DateTimeImmutable $dateAt): static
    {
        $this->dateAt = $dateAt;

        return $this;
    }

    /**
     * @return Collection<int, Membre>
     */
    public function getMembres(): Collection
    {
        return $this->membres;
    }

    public function addMembre(Membre $membre): static
    {
        if (!$this->membres->contains($membre)) {
            $this->membres->add($membre);
            $membre->setCaisseSocial($this);
        }

        return $this;
    }

    public function removeMembre(Membre $membre): static
    {
        if ($this->membres->removeElement($membre)) {
            // set the owning side to null (unless already changed)
            if ($membre->getCaisseSocial() === $this) {
                $membre->setCaisseSocial(null);
            }
        }

        return $this;
    }
}
