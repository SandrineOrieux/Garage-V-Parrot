<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\RepairService;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class RepairSericeFixtures extends Fixture
{

  public function load(ObjectManager $manager): void
  {
    $user = $this->getReference('user_1');
    $faker = Factory::create('fr_FR');

    for ($nbService = 1; $nbService <= 5; $nbService++) {
      $service = new RepairService();
      $service->setName($faker->sentence($faker->numberBetween(3, 8)));
      $service->setDescription($faker->paragraph($faker->numberBetween(2, 5)));
      $service->setCreatedBy($user);
      $manager->persist($service);
    }


    $manager->flush();
  }
  public function getDependencies()
  {
    return [
      UserFixtures::class
    ];
  }
}
