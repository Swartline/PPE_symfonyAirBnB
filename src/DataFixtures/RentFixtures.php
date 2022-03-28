<?php

namespace App\DataFixtures;

use App\Entity\Rent;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class RentFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $timestamp = mt_rand(1, time());
        $date = new \DateTime("2009-04-10");
        $date->setTimestamp($timestamp);

        for ($i = 0; $i < 20; $i++) {
            $rent = new Rent();
            $rent->setInventoryFile('fichier'.$i);
            $rent->setArrivalDate($date);
            $rent->setDepartureDate($date);
            $rent->setTenantComments('rien à signaler');
            $rent->setTenantSignature('Nom du locataire');
            $rent->setTenantValidatedAt($date);
            $rent->setRepresentativeComments('rien à signaler');
            $rent->setRepresentativeSignature('Nom du mandataire');
            $rent->setRepresentativeValidatedAt($date);
            $manager->persist($rent);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            UserFixtures::class,
            ResidenceFixtures::class
        ];
    }
}
