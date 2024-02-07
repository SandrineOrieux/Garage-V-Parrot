<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Brand;
use App\Entity\Model;
use App\Entity\Power;
use App\Entity\Energy;
use App\Entity\Option;
use App\Entity\FiscalPower;
use App\Entity\Transmission;
use App\Entity\NumberOfDoors;
use App\Entity\NumberOfSeats;
use App\Entity\TypeOfVehicles;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;


class FeatureVehicleFixture extends Fixture
{

  public function load(ObjectManager $manager): void
  {
    $faker = Factory::create('fr_FR');

    //brands and models
    $brands = [
      "Peugeot" => ['2008', '208', '3008', '308', '408', '5008', '508', 'Boxer'],
      "Renault" => ['Arkana', 'Austral', 'Captur', 'Clio', 'D10', 'Espace', 'Express Van', 'Grand Kangoo'],
      "Citroën" => ['Ami', 'Berlingo', 'C3', 'C3 Aircross', 'C4', 'C5 Aircross', 'C5 X', 'Grand C4 Spacetourer'],
      "Dacia" => ['Spring', 'Sandero', 'Sandero Stepway', 'Duster', 'Jogger'],
      "Volkswagen" => ['Polo', 'Golf', 'Taigo', 'T-Cross', 'ID.3', 'T-Roc', 'Tiguan', 'Touran', 'Passat'],
      "Toyota" => ['Aygo X Air Limited', 'Aygo X Dynamic', 'Yaris', 'Yaris Cross Hybride', 'Corolla', 'Corolla Touring Sports', 'BZ4X', 'Camry'],
      "Mercedes" => ['709', 'Antos', 'Atego', 'Citan', 'Cla', 'Classe A', 'Classe B', 'Classe C'],
      "Audi" => ['Q4 e-tron', 'Q8 e-tron', 'e-tron', 'e-tron GT', 'A1', 'A3', 'A4', 'A5'],
      "BMW" => ['I3', 'I4', 'I5', 'I7', 'I8', 'Ix', 'Ix2', 'Ix3'],
      "Hyundai" => ['IONIQ 5', 'IONIQ 6', 'KONA Electric', 'KONA Hybrid', 'TUCSON Hybrid', 'TUCSON Plug-in', 'SANTA FE Hybrid', 'SANTA FE Plug-in']
    ];

    $countBrand = 1;
    foreach ($brands as $brand => $models) {
      $newBrand = new Brand();
      $newBrand->setName($brand);

      $manager->persist($newBrand);
      $this->addReference('Brand_' . $countBrand, $newBrand);
      $countBrand++;

      foreach ($models as $key => $model) {
        $newModel = new Model();
        $newModel->setName($model);
        $newModel->setBrand($newBrand);
        $manager->persist($newModel);
        //add reference 
        $this->setReference('Model_' . $key, $newModel);
      }
    }

    //Energy
    $energies = ['Diesel', 'Hybride', 'Essence', 'Electrique'];

    foreach ($energies as $key => $value) {
      $energy = new Energy();
      $energy->setName($value);
      $this->addReference('Energy_' . $key, $energy);
      $manager->persist($energy);
    }

    //fiscal power
    $countFiscal = 1;
    for ($nb = 4; $nb <= 12; $nb++) {
      $power = new FiscalPower();
      $power->setNumber($nb);
      $this->addReference('Fiscal_' . $countFiscal, $power);
      $countFiscal++;
      $manager->persist($power);
    }

    //Number of Doors

    $nbportes = [3, 5];
    foreach ($nbportes as $key => $nbporte) {
      $newNumber = new NumberOfDoors();
      $newNumber->setNumber($nbporte);
      $this->addReference('Doors_' . $key, $newNumber);
      $manager->persist($newNumber);
    }

    //number of seats
    $nbseats = [2, 3, 5, 7];
    foreach ($nbseats as $key => $nbseat) {
      $newNumber = new NumberOfSeats();
      $newNumber->setNumber($nbseat);
      $this->addReference('Seat_' . $key, $newNumber);
      $manager->persist($newNumber);
    }

    //options
    for ($i = 1; $i <= 20; $i++) {
      $newOption = new Option();
      $newOption->setName($faker->sentence($faker->numberBetween(2, 6)));
      $this->addReference('Option_' . $i, $newOption);
      $manager->persist($newOption);
    }

    //power
    for ($i = 90; $i <= 150; $i++) {
      $newpower = new Power();
      $newpower->setNumber($i);
      $this->addReference('Power_' . $i, $newpower);
      $manager->persist($newpower);
    }
    //Transmission

    $transmissions = ['automatique', 'manuel'];

    foreach ($transmissions as $key => $transmission) {
      $newT = new Transmission();
      $newT->setName($transmission);
      $this->addReference('Transmission_' . $key, $newT);
      $manager->persist($newT);
    }

    //typeOfVehicles

    $typesOfVehicles = [
      'Citadines',
      'Compactes',
      'Breaks',
      'Berlines',
      'Coupés',
      'Monospaces',
      'Ludospace',
      'SUV'
    ];

    foreach ($typesOfVehicles as $key => $type) {
      $Newtype = new TypeOfVehicles();
      $Newtype->setName($type);
      $this->addReference('Type_' . $key, $Newtype);
      $manager->persist($Newtype);
    }



    $manager->flush();
  }
}
