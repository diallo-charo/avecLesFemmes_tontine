<?php

namespace App\DataFixtures;

use App\Entity\Groupement;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class GroupementFixtures extends Fixture
{

// la methode load() permet d'enregistrer des donnees
    public function load(ObjectManager $manager): void
    {
        //1. NOTRE tableau de donneee
        $data = [
            ['GIE Teranga Mbour', '771234567', 'Mbour, Thiès'],
            ['GIE Jappo Dakar', '782345678', 'Pikine, Dakar'],
            ['GIE Dëgg Saint-Louis', '763456789', 'Sor, Saint-Louis'],
        ];

        foreach ($data as $key => [$nom, $telephone, $adresse]) {
            # code...
            $groupement = (new Groupement())
                        ->setNom($nom)
                        ->setTelephone($telephone)
                        ->setAdresse($adresse);  

            $manager->persist($groupement);  //elle ajoute dans la cache
        }
        $manager->flush(); //elle ajoute en base de donnee 

        // $product = new Product();
        // $manager->persist($product);
    }
    
}
