<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use App\Repository\VehicleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
    public function showOne(VehicleRepository $repos, $id, Request  $request, EntityManagerInterface $em): Response
    {
        $Vehicule = $repos->findOneBy(['id' => $id]);
        dump($Vehicule->getBrand());

        $contact = new Contact();
        $contact->setIsContacted(false);
        $contact->setObject($Vehicule->getId() . '-' . $Vehicule->getModel() . '-' . $Vehicule->getTitle());


        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($contact);
            $em->flush();
        }

        return $this->render('vehicle/showOne.html.twig', [
            'vehicle' =>  $Vehicule,
            'form' => $form
        ]);
    }
}
