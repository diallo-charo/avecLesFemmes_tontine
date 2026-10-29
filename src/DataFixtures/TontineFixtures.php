<?php

namespace App\DataFixtures;

use App\Entity\Tontine;
use App\Repository\GroupementRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Override;

class TontineFixtures extends Fixture implements DependentFixtureInterface
{
    public function __construct(private readonly GroupementRepository $repo)
    {
        
    }
    public function load(ObjectManager $manager): void
    {
        $groupements = $this->repo->findAll();
        foreach ($groupements as $key => $groupement) {
            # code...
            $tontine = (new Tontine())
                    ->setGroupement($groupement)
                    ->setNom("Tontine Ramadan")
                    ->setMontantCotisation(10000)
                    ->setDateDebut(new \DateTimeImmutable("2026-02-10"))
                    ->setDateFin(new \DateTime("2026-10-03"));
            $manager->persist($tontine);
        }
        
        $manager->flush();
    }

    #[Override]
    public function getDependencies(): array
    {
        return [GroupementFixtures::class];
    }
}
