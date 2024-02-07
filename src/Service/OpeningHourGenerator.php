<?php

namespace App\Service;


use App\Repository\OpeningHourRepository;


class OpeningHourGenerator
{
  private $repos;

  public function __construct(OpeningHourRepository $openingHourRepository)
  {
    $this->repos = $openingHourRepository;
  }

  public function getopeningHours(): array
  {

    $hours = $this->repos->findAll();


    return $hours;
  }
}
