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
    #[Route('/vehicles/{id}', name: 'app_vehicle_show')]
    public function showOne(VehicleRepository $repos, $id): Response
    {
        $Vehicule = $repos->findOneBy(['id' => $id]);

        return $this->render('vehicle/showOne.html.twig', [
            'vehicle' =>  $Vehicule,
        ]);
    }
}
