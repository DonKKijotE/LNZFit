<?php

namespace App\DataFixtures;

use App\Entity\Sport;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class SportFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

            $sport = new Sport();
            $sport->setName('Padel 2 vs 2');
            $sport->setMinSlots(4);
            $sport->setMaxSlots(4);
            $manager->persist($sport);

            $manager->flush();

            $sport = new Sport();
            $sport->setName('Padel 1 vs 1');
            $sport->setMinSlots(2);
            $sport->setMaxSlots(2);
            $manager->persist($sport);


            $manager->flush();
    }
}
