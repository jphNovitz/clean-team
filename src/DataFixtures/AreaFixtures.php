<?php

namespace App\DataFixtures;

use App\Entity\Area;
use App\Entity\Room;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AreaFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 4; $i++):
            $faker = Factory::create();
            $area = new Area();
            $area->setName($faker->unique()->word);
            $area->setCreated(new \DateTime('now'));
            $area->setUpdated(new \DateTime('now'));
            $area->setContentChanged(new \DateTime('now'));
            $manager->persist($area);
            $this->addReference('area_'.$i, $area);
        endfor;

        $manager->flush();
    }
}
