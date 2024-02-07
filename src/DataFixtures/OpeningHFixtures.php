<?php

namespace App\DataFixtures;


use App\Entity\OpeningHour;
use App\Entity\TimeSlot;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;


class OpeningHFixtures extends Fixture implements DependentFixtureInterface
{

  public function load(ObjectManager $manager): void
  {
    $days = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];
    $times = ['08H00', '12H00', '13H00', '17H30'];
    $user = $this->getReference('user_1');
    $timeSlotam = new TimeSlot();
    $timeSlotam->setStart($times[0]);
    $timeSlotam->setEnd($times[1]);
    $timeSlotpm = new TimeSlot();
    $timeSlotpm->setStart($times[2]);
    $timeSlotpm->setEnd($times[3]);

    $manager->persist($timeSlotam);
    $manager->persist($timeSlotpm);

    foreach ($days as $day) {
      $openingH = new OpeningHour();
      $openingH->setDay($day);
      $openingH->setCreatedBy($user);
      if ($day === 'Mercredi') {
        $openingH->setAm($timeSlotam);
      } elseif ($day === 'Samedi' || $day === 'Dimanche') {
        $openingH->setAm(Null);
        $openingH->setPm(Null);
      } else {
        $openingH->setAm($timeSlotam);
        $openingH->setPm($timeSlotpm);
      }
      $manager->persist($openingH);
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
