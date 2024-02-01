<?php

namespace App\DataFixtures;

use App\Entity\Project;
use App\Entity\Technology;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class ProjectFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Create and persist some sample projects
        $project1 = new Project();
        $project1->setName('Project 1');
        $project1->setDescription('Description for Project 1');
        $project1->setGitHubLink('https://github.com/project1');
        $project1->setPicture('https://picsum.photos/200');
        $project1->setDate('2022-01-25');
        // Add more properties and associations as needed

        $manager->persist($project1);

        $project2 = new Project();
        $project2->setName('Project 2');
        $project2->setDescription('Description for Project 2');
        $project2->setGitHubLink('https://github.com/project2');
        $project2->setPicture('https://picsum.photos/200');
        $project2->setDate('2022-01-26');
        // Add more properties and associations as needed

        $manager->persist($project2);

        // Flush the changes to the database
        $manager->flush();
    }

}
