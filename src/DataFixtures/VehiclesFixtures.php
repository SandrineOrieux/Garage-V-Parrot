<?php

namespace App\DataFixtures;

use App\Entity\ImagesVehicle;
use Faker\Factory;
use App\Entity\Vehicle;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class VehiclesFixtures extends Fixture
{

  public function load(ObjectManager $manager): void
  {
    $faker = Factory::create('fr_FR');




    for ($vehicle = 1; $vehicle <= 15; $vehicle++) {
      $brand = $this->getReference('Brand_' . $faker->numberBetween(1, 10));
      $model = $this->getReference('Model_' . $faker->numberBetween(0, 4));
      $energie = $this->getReference('Energy_' . $faker->numberBetween(0, 3));
      $fiscalP = $this->getReference('Fiscal_' . $faker->numberBetween(1, 8));
      $doors = $this->getReference('Doors_' . $faker->numberBetween(0, 1));
      $seat = $this->getReference('Seat_' . $faker->numberBetween(0, 3));
      $option = $this->getReference('Option_' . $faker->numberBetween(1, 20));
      $power = $this->getReference('Power_' . $faker->numberBetween(90, 150));
      $transmission = $this->getReference('Transmission_' . $faker->numberBetween(0, 1));
      $type = $this->getReference('Type_' . $faker->numberBetween(0, 7));

      $user = $this->getReference('user_' . $faker->numberBetween(1, 15));

      $newVehicle = new Vehicle();
      $newVehicle->setTitle($faker->sentence($faker->numberBetween(5, 8)))
        ->setYear($faker->dateTime())
        ->setKilometer($faker->numberBetween(15000, 200000))
        ->setPrice($faker->numberBetween(15000, 55000))
        ->setDescription($faker->paragraph($faker->numberBetween(2, 5)))
        ->setCreatedBy($user)
        ->setType($type)
        ->setBrand($brand)
        ->setModel($model)
        ->setEnergy($energie)
        ->setTransmission($transmission)
        ->setNumberOfDoors($doors)
        ->setNumberOfSeats($seat)
        ->setPower($power)
        ->setFiscalPower($fiscalP);


      for ($i = 1; $i <= $faker->numberBetween(3, 8); $i++) {
        $option = $this->getReference('Option_' . $faker->numberBetween(1, 20));
        $newVehicle->addOption($option);
      }

      for ($i = 1; $i <= 4; $i++) {
        // $img = $faker->image('public/images/parrot', 640, 480);
        // $nomImg = basename($img);
        $imgVehicles = new ImagesVehicle();
        $imgVehicles->setImageName('voiture.jpg');
        $newVehicle->addImage($imgVehicles);
      }
      $manager->persist($newVehicle);
    }


    $manager->flush();
  }
  public function getDependencies()
  {
    return [
      UserFixtures::class,
      FeatureVehicleFixture::class
    ];
  }
}
