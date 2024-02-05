<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Faker;

class UserFixtures extends Fixture
{
  private $encoder;

  public function __construct(UserPasswordHasherInterface $encoder)
  {
    $this->encoder = $encoder;
  }
  public function load(ObjectManager $manager): void
  {
    $faker = Faker\Factory::create('fr_FR');

    for ($nbUsers = 1; $nbUsers <= 15; $nbUsers++) {
      $user = new User();
      if ($nbUsers === 1) {
        $user->setEmail('vincent.parrot@garage-v-parrot.com');
        $user->setPassword($this->encoder->hashPassword($user, 'azerty'));
        $user->setFirstname('Vincent');
        $user->setLastname('Parrot');
        $user->setRoles(['ROLE_ADMIN']);
      } else {
        $user->setEmail($faker->email);
        $user->setPassword($this->encoder->hashPassword($user, 'azerty'));
        $user->setFirstname($faker->firstName);
        $user->setLastname($faker->lastName);
        $user->setRoles(['ROLE_USER']);
      }
      //add reference 
      $this->addReference('user_' . $nbUsers, $user);

      $manager->persist($user);
    }
    $manager->flush();
  }
}
