<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 20; $i++) {
            $user = new User();
            $user->setRole('user '.$i);
            $user->setEmail();
            $user->setPassword();
            $user->setIsVerified();
            $manager->persist($user);
        }

        $manager->flush();
    }
}
