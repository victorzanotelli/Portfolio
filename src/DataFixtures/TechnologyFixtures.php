<?php

namespace App\DataFixtures;

use App\Entity\Technology;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TechnologyFixtures extends Fixture
{

    public const TECHNOLOGY = [
        'Peinture',
        'Sculpture',
        'Photo',
        'FanArt',
        'IA',
    ];
    public function load(ObjectManager $manager): void
    {
        foreach (self::TECHNOLOGY as $technoName) {
            $techno = new Technology();
            $techno->setName($technoName);
            $manager->persist($techno);
            $this->addReference('Techno_' . $technoName, $techno);
        }
        $manager->flush();
    }
}
