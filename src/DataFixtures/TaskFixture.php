<?php

namespace App\DataFixtures;

use App\Entity\Task;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class TaskFixture extends Fixture
{
    public const TASK_REFERENCE = 'task';
//    protected $TASK_REFERENCES = ;

    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 70; $i++):
            $faker = Factory::create();
            $task = new Task();
            $task->setName($faker->word);
            $task->setComment($faker->sentence);
            $task->setCreated(new \DateTime('now'));
            $task->setUpdated(new \DateTime('now'));
            $task->setContentChanged(new \DateTime('now'));
            $manager->persist($task);
            $this->addReference('task_'.$i, $task);
        endfor;

// add more products

        $manager->flush();

    }
}