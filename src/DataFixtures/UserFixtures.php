<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;


class UserFixtures extends Fixture
{
    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    private UserPasswordHasherInterface $passwordHasher;
    public function load(ObjectManager $manager): void
    {
        $admin = new User();
        $admin->setEmail('admin@monsite.com');
        $admin->setRoles(['ROLE_ADMIN']);
        $admin->setGitHubLink('https://github.com/project2');
        $admin->setPicture('https://imgs.search.brave.com/lnqmCxLQJhkWmw0U6an8BkG2A-zMt8--L6o2El486fE/rs:fit:500:0:0/g:ce/aHR0cHM6Ly9pLnBp/bmltZy5jb20vb3Jp/Z2luYWxzLzU3L2Y1/LzExLzU3ZjUxMWY5/NGM0OTAxNWIxNWFj/MGFmMDcyYmRhZDFj/LmpwZw');
        $admin->setName("Victor");
        $this->addReference('Victor', $admin);
        $hashedPassword = $this->passwordHasher->hashPassword(
            $admin,
            'admin'
        );
        $admin->setPassword($hashedPassword);
        $manager->persist($admin);

        $manager->flush();
    }
}
