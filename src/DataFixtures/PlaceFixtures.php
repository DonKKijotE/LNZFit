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
            $place->setMaplink('<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2935.1384166979424!2d-13.541835918553163!3d28.972922126031165!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xc489d88bdaebeff%3A0xcfbb0a5da3b93d11!2sP%C3%A1del+Club!5e0!3m2!1ses!2ses!4v1520290610693" allowfullscreen></iframe>');
            $admin = array('1','2');
            $place->setAdmin($admin);
            $manager->persist($place);

            $manager->flush();

            $place = new Place();
            $place->setName('Hyde Park Padel');
            $place->setMaplink('<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2076.350232808824!2d-13.641346358505587!3d28.928319318619778!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xc2afb4693c0fcb9!2sHyde+Park+Padel!5e0!3m2!1ses!2ses!4v1520291885550" allowfullscreen></iframe>');
            $admin = array('1','2');
            $place->setAdmin($admin);
            $manager->persist($place);

            $manager->flush();
    }
}
