<?php

namespace App\DataFixtures;

use App\Entity\Seance;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SeanceFix extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for($i=1;$i<8;$i++)
        {
            $seance=new Seance($i);
            $manager->persist($seance);
        }
        $manager->flush();
}
}