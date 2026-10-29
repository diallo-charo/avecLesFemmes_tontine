<?php

namespace App\DataFixtures;

use App\Repository\GroupementRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class EpargneFixtures extends Fixture implements DependentFixtureInterface
{
    public function __construct(private readonly GroupementRepository $repo)
    {
        
    }
    public function load(ObjectManager $manager): void
    {

        $groupements = $this->repo->findAll();
        foreach ($groupements as $key => $groupement) {
            # code...
            $epargne = (new \App\Entity\Epargne())
                    ->setGroupement($groupement)
                    ->setNom("Epargne Ramadan")
                    ->setObjectifEpargne(1000000)
                    ->setDateDebut(new \DateTimeImmutable("2026-02-10"))
                    ->setDateFin(new \DateTime("2026-10-03"));
            $manager->persist($epargne);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [GroupementFixtures::class];
    }


}
