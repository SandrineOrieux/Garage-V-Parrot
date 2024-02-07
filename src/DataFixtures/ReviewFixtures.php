<?php

namespace App\DataFixtures;

use App\Entity\Review;
use Faker\Factory;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ReviewFixtures extends Fixture
{

  public function load(ObjectManager $manager): void
  {
    $faker = Factory::create('fr_FR');
    for ($nbReview = 1; $nbReview <= 20; $nbReview++) {
      $review = new Review();
      $review->setName($faker->userName());
      $review->setRate($faker->numberBetween(1, 5));
      $review->setComment($faker->paragraph($faker->numberBetween(1, 5)));
      $review->setIsvalidated($faker->boolean());
      $manager->persist($review);
    }
    $manager->flush();
  }
}
