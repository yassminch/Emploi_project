<?php

namespace App\DataFixtures;

use App\Entity\Salle;
use App\Entity\Bloc;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SalleFix extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $b=new Bloc();
        $manager->persist($b);
        for($i=1;$i<6;$i++)
        {
            $Salle=new Salle();
            $Salle->setVidproj(false);
            $Salle->setBloc($b);
            $manager->persist($Salle);
        }
        $b2=new Bloc();
        $manager->persist($b2);
        for($i=6;$i<11;$i++)
        {
            $Salle=new Salle();
            $Salle->setVidproj(false);
            $Salle->setBloc($b2);
            $manager->persist($Salle);
        }
        $manager->flush();
    }
}