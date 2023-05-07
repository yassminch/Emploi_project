<?php

namespace App\DataFixtures;

use App\Entity\Matiere;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MatiereFix extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        for($i=1;$i<6;$i++)
        {
            $matiere=new Matiere();
            $matiere->setNomMat("mat $i");
            $matiere->setType("TP");
            $manager->persist($matiere);
        }
        for($i=6;$i<11;$i++)
        {
            $matiere=new Matiere();
            $matiere->setNomMat("mat $i");
            $matiere->setType("Cours");
            $manager->persist($matiere);
        }
        $manager->flush();
}
}