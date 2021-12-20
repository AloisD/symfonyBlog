<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    const CATEGORIES = [
        "Rubik's cube and other puzzles",
        "Chess",
        "Halo",
        "Bouldering"
    ];

    public function load(ObjectManager $manager)
    {
        foreach (self::CATEGORIES as $key => $categorieName) {
            $category = new Category();
            $category->setName($categorieName);
            $manager->persist($category);
        }
        $manager->flush();
    }
}