<?php

namespace App\DataFixtures;

use App\Entity\Classe;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ClasseFix extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        for($i=1;$i<3;$i++)
        {
            $classe=new Classe();
            $classe->setName("classe $i");
            $manager->persist($classe);
        }
        $manager->flush();
}
}