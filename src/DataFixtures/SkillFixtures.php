<?php

namespace App\DataFixtures;

use App\Entity\Skill;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SkillFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        //define array of skills (hardcoded)
        $skills = [
            "hard" => ["React", "Symfony", "Next", "Laravel", "Python", "MySQL"],
        ];
        // loop through list, $value returns array
        foreach ($skills as $type => $names) {
            foreach ($names as $skill) {
                $skillToAdd = new Skill();
                $skillToAdd->setType($type);
                $skillToAdd->setName($skill);
                $manager->persist($skillToAdd);
            }
        }
        $manager->flush();
    }
}
