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
        for ($i = 1; $i < 60; $i++):
            $faker = Factory::create();
            $room = new Room();
            $room->setNumber($i);
            $room->setCreated(new \DateTime('now'));
            $room->setUpdated(new \DateTime('now'));
            $room->setContentChanged(new \DateTime('now'));
            for ($j = 0; $j<8; $j++) :
                $room->addTask($this->getReference('task_'.$faker->unique()->numberBetween(1, 60)));

            endfor;
            $manager->persist($room);
        endfor;

// add more products

        $manager->flush();
    }

    public function getDependencies()
    {
        return[
          TaskFixture::class,
        ];
    }
}