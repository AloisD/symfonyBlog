<?php

namespace App\DataFixtures;

use App\Entity\Post;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class BlogFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        foreach (CategoryFixtures::CATEGORIES as $key => $category) {
            for ($i = 0; $i < 10; $i++) {
                $blogPost = new Post();
                $blogPost->setTitle("Titre".$i);
                $blogPost->setAuthor("Auteur".$i);
                $blogPost->setContent("dfgvhbjnkl,m;ù:");
                $blogPost->setCategory($this->getReference('CAT_'.$key));
                $manager->persist($blogPost);
            }
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
          CategoryFixtures::class,
        ];
    }
}
