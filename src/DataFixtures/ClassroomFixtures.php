<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Classroom;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class ClassroomFixtures extends Fixture
{ 
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');
        for ($i = 0; $i < 20; $i++) {
            $dates = mt_rand(strtotime('2010-06-01'),strtotime('2023-12-31'));
            $date = date("Y-m-d", $dates);
            $date1 = date("Y-m-d", $dates+35000000);
            $classroom = (new Classroom())
                ->setName($faker->firstname())
                ->setStartAt( new \DateTime($date))
                ->setEndAt( new \DateTime($date1))
            ;
            $manager->persist($classroom);
        }
        $manager->flush();
    }
}
