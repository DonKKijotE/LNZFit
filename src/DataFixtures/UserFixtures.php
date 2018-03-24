<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{

    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
      $this->encoder = $encoder;
    }


    public function load(ObjectManager $manager)
    {

            $user = new User();
            $user->setName('Javier');
            $user->setSurname('Núñez');
            $user->setUsername('Javi');
            $user->setEmail('javi_lanzarote@hotmail.com');
            $roles = array('ROLE_ADMIN');
            $user->setRoles($roles);
            $password = $this->encoder->encodePassword($user, '123456');
            $user->setPassword($password);
            $manager->persist($user);
            $manager->flush();

            $user = new User();
            $user->setName('Adri');
            $user->setSurname('Sainz');
            $user->setUsername('BarrabasZ');
            $user->setEmail('barra@bas.com');
            $roles = array('ROLE_ADMIN');
            $user->setRoles($roles);
            $password = $this->encoder->encodePassword($user, '123456');
            $user->setPassword($password);
            $manager->persist($user);
            $manager->flush();

            $user = new User();
            $user->setName('Crash');
            $user->setSurname('Dummy');
            $user->setUsername('Crash Dummy');
            $user->setEmail('crash@dummy.com');
            $roles = array('ROLE_USER');
            $user->setRoles($roles);
            $password = $this->encoder->encodePassword($user, '123456');
            $user->setPassword($password);
            $manager->persist($user);
            $manager->flush();

            $user = new User();
            $user->setName('Chuck');
            $user->setSurname('Norris');
            $user->setUsername('Chuck Norris');
            $user->setEmail('chuck@norris.com');
            $roles = array('ROLE_USER');
            $user->setRoles($roles);
            $password = $this->encoder->encodePassword($user, '123456');
            $user->setPassword($password);
            $manager->persist($user);
            $manager->flush();




    }
}
