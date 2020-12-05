<?php

namespace App\DataFixtures;

use App\Entity\Actor;
use App\Entity\Program;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ActorFixtures extends Fixture implements DependentFixtureInterface
{
    const ACTORS = [
        "Andrew Lincoln",
        "Norman Reedus",
        "Lauren Cohan",
        "Danai Gurira",
    ];

    public function load(ObjectManager $manager)
    {
        $programs = $manager->getRepository(Program::class)->findAll();
        foreach (self::ACTORS as $key => $actorName) {
            $actor = new Actor();
            $actor->setName($actorName);
            $manager->persist($actor);
            foreach (array_rand($programs, rand(1, count($programs))) as $program) {
                $actor->addProgram($programs[$program]);
            }
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return [ProgramFixtures::class];
    }
}
