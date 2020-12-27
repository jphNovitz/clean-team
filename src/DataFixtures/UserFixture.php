<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class UserFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 0 ; $i< 10 ; $i++):
        $faker = Factory::create();
        $user = new user();
        $user->setEmail($faker->email);
        $user->setPassword($faker->password);
        $user->setFirstName($faker->firstName);
        $user->setLastName($faker->lastName);
        $manager->persist($user);
        endfor;

// add more products

        $manager->flush();
    }
}