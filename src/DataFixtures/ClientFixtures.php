<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Client;

class ClientFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 1; $i <= 20; $i++) {
            $client = new Client();
            $client->setName( 'Client_' . $i);
            $this->addReference('Client_' . $i, $client);
            $manager->persist($client);

        }
        $manager->flush();
    }
}