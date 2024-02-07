<?php

namespace App\Controller;

use App\Repository\VehicleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VehicleController extends AbstractController
{
    #[Route('/vehicles', name: 'app_vehicles')]
    public function index(VehicleRepository $repos): Response
    {
        $vehiclesList = $repos->findAll();



        return $this->render('vehicle/index.html.twig', [
            'vehiclesList' =>  $vehiclesList,
        ]);
    }
}
