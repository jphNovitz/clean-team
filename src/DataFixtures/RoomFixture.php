<?php

namespace App\DataFixtures;

use App\Entity\Room;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class RoomFixture extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        for ($i = 1 ; $i < 250 ; $i++):
            $faker = Factory::create();
            $room = new Room();
            $room->setNumber($i);
            $room->setCreated(new \DateTime('now'));
            $room->setUpdated(new \DateTime('now'));
            $room->setContentChanged(new \DateTime('now'));
            $room->setArea($this->getReference('area_' . $faker->unique()->numberBetween(0, 3)));
            $room->setOrganisation($this->getReference('organisation_' . $faker->unique()->numberBetween(0, 3)));

            $manager->persist($room);
        endfor;

// add more products

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            TaskFixture::class,
        ];
    }
}