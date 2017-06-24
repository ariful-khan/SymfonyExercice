<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\User;

class LoadUserData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $userAdmin = new User();
        $userAdmin->setUsername('admin');
        $userAdmin->setEmail('admin@symfony.com');
        $userAdmin->setPassword('admin');

        $user = new User();
        $user->setUsername('user');
        $user->setEmail('user@symfony.com');
        $user->setPassword('user');

        $manager->persist($userAdmin);
        $manager->persist($user);
        $manager->flush();
    }
}
