<?php

namespace App\DataFixtures;

use App\Entity\Organisation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class OrganisationFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 4; $i++):
            $faker = Factory::create();
            $organisation = new Organisation();
            $organisation->setName($faker->unique()->word);
            $organisation->setCreated(new \DateTime('now'));
            $organisation->setUpdated(new \DateTime('now'));
            $organisation->setContentChanged(new \DateTime('now'));
            $manager->persist($organisation);
            $this->addReference('organisation_'.$i, $organisation);
        endfor;

// add more products

        $manager->flush();
    }
}
