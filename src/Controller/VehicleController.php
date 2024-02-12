<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use App\Form\FilterVehicleType;
use App\Repository\VehicleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VehicleController extends AbstractController
{
    private function areAllNumericOrNull($array): bool
    {
        return count(array_filter($array, function ($value) {
            return is_numeric($value) || is_null($value);
        })) === count($array);
    }

    #[Route('/vehicles', name: 'app_vehicles')]
    public function index(VehicleRepository $repos, Request $request): Response
    {
        $message = null;
        $filterCriterias = Null;
        $form = $this->createForm(FilterVehicleType::class);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            $filterCriterias = $form->getData();
            if ($this->areAllNumericOrNull($filterCriterias)) {
                //if value min = null et value max != null
                if ($filterCriterias['priceMin'] == null && $filterCriterias['priceMax']) {
                    $filterCriterias['priceMin'] = '0';
                }
                if ($filterCriterias['kmMin'] == null && $filterCriterias['kmMax']) {
                    $filterCriterias['kmMin'] = '0';
                }
                if ($filterCriterias['yearMin'] == null && $filterCriterias['yearMax']) {
                    $filterCriterias['yearMin'] = '0';
                }


                //if value min != null et value max = null
                if ($filterCriterias['priceMin']  && $filterCriterias['priceMax'] == null) {
                    $filterCriterias['priceMax'] = '500000';
                }
                if ($filterCriterias['kmMin']  && $filterCriterias['kmMax'] == null) {
                    $filterCriterias['kmMax'] = '1000000';
                }
                if ($filterCriterias['yearMin']  && $filterCriterias['yearMax'] == null) {
                    $filterCriterias['yearMax'] = date("Y");
                    dump(date("Y"));
                    dump($filterCriterias);
                }
                if (($filterCriterias['priceMin'] > $filterCriterias['priceMax']) |
                    ($filterCriterias['yearMin'] > $filterCriterias['yearMax']) |
                    ($filterCriterias['kmMin'] > $filterCriterias['kmMax'])
                ) {
                    $message = 'Veuillez mettre une valeur maximum supérieur à la valeur minimum.';
                }
            } else {
                $message = 'veuillez entrer un nombre';
            }



            $vehiclesList = $repos->findByCriterias($filterCriterias);
        } else {
            $vehiclesList = $repos->findAll();
        }



        return $this->render('vehicle/index.html.twig', [
            'vehiclesList' =>  $vehiclesList,
            'form' => $form,
            'message' => $message
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
