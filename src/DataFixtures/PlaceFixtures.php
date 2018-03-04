<?php

namespace App\DataFixtures;

use App\Entity\Place;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class PlaceFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

            $place = new Place();
            $place->setName('Lanzarote Padel Club');
            //$place->setSports("1,2");
            $manager->persist($place);

            $manager->flush();

            $place = new Place();
            $place->setName('Hyde Park Padel');
            //$place->setSports("1");
            $manager->persist($place);

            $manager->flush();
    }
}
