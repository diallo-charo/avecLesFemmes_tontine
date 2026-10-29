<?php

namespace App\DataFixtures;

use App\Entity\Exercice;
use App\enum\StatusExercice;
use App\Repository\GroupementRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Override;

class ExerciceFixtures extends Fixture implements DependentFixtureInterface
{
    // injection de dependance + singleton elle est fait par le readonly

    public function __construct(private readonly GroupementRepository $repo) 
    {
    
    }

    public function load(ObjectManager $manager): void
    {
        $groupements = $this->repo->findAll();
        foreach ($groupements as $key => $groupement ) {
            # code...
            $exercice = (new Exercice())
                        ->setNom("nomHasard")
                        ->setGroupement($groupement)
                        ->setDateDebut(new \DateTime("2026-02-10"))
                        ->setDateFinAt(new \DateTime('2026-12-31'))
                        ->setDateRestribution(new \DateTime('2026-11-01'))
                        ->setStatus(StatusExercice::ENCOURS);

            $manager->persist($exercice);
        }
        // $product = new Product();
        $manager->flush();
    }


    #[Override]
    public function getDependencies(): array
    {
        return [GroupementFixtures::class];
    }
}
