<?php

namespace App\DataFixtures;

use App\Entity\Rent;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class RentFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $array=array('Owner', 'Tenant', 'Representive');

        for ($i = 0; $i < 20; $i++) {
            $rent = new Rent();
            $rent->setRole($array[rand(0,2)]);
            $rent->setEmail('matteomarinho@ymail.com');
            $rent->setPassword('123456');
            $rent->setIsVerified(rand(0,1));
            $manager->persist($rent);
        }

        $manager->flush();
    }
}
