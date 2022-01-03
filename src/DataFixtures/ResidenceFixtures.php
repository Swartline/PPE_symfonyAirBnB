<?php

namespace App\DataFixtures;

use App\Entity\Residence;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ResidenceFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $array=array('Owner', 'Tenant', 'Representive');

        for ($i = 0; $i < 20; $i++) {
            $residence = new Residence();
            $residence->setRole($array[rand(0,2)]);
            $residence->setEmail('matteomarinho@ymail.com');
            $residence->setPassword('123456');
            $residence->setIsVerified(rand(0,1));
            $manager->persist($residence);
        }

        $manager->flush();
    }
}
