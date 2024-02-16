<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Entity\Brand;
use App\Entity\Contact;
use App\Entity\Energy;
use App\Entity\FiscalPower;
use App\Entity\ImagesVehicle;
use App\Entity\Model;
use App\Entity\NumberOfDoors;
use App\Entity\NumberOfSeats;
use App\Entity\Review;
use App\Entity\TimeSlot;
use App\Entity\OpeningHour;
use App\Entity\Option;
use App\Entity\Power;
use App\Entity\RepairService;
use App\Entity\Transmission;
use App\Entity\TypeOfVehicles;
use App\Entity\Vehicle;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class AdminDashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'app_admin')]
    public function index(): Response
    {
        //return parent::index();

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // return $this->redirect($adminUrlGenerator->setController(OneOfYourCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        return $this->render('admin/admindashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Garage V.Parrot');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Employés', 'fas fa-user', User::class);
        yield MenuItem::linkToCrud('Horaires d\'ouverture', 'fas fa-clock', OpeningHour::class);
        yield MenuItem::linkToCrud('Créneaux horaires', 'fas fa-clock-rotate-left', TimeSlot::class);
        yield MenuItem::linkToCrud('Services', 'fas fa-screwdriver-wrench', RepairService::class);
        yield MenuItem::linkToCrud('Témoignages', 'fa-solid fa-comment', Review::class);
        yield MenuItem::linkToCrud('Contact', 'fa-solid fa-message', Contact::class);
        yield MenuItem::linkToCrud('Véhicules', 'fa-solid fa-car', Vehicle::class);
        yield MenuItem::subMenu('Caractéristiques', 'fa-solid fa-gear')->setSubItems([
            MenuItem::linkToCrud('Marques', 'fa-solid fa-angles-up', Brand::class),
            MenuItem::linkToCrud('Energie', 'fa-solid fa-gas-pump', Energy::class),
            MenuItem::linkToCrud('Puissance fiscale', 'fa-solid fa-bolt', FiscalPower::class),
            MenuItem::linkToCrud('Images', 'fa-solid fa-images', ImagesVehicle::class),
            MenuItem::linkToCrud('Model', 'fa-solid fa-car-on', Model::class),
            MenuItem::linkToCrud('Nombre de portes', 'fa-solid fa-car-side', NumberOfDoors::class),
            MenuItem::linkToCrud('Nombre de sièges', 'fa-solid fa-users', NumberOfSeats::class),
            MenuItem::linkToCrud('Options', 'fa-solid fa-sliders', Option::class),
            MenuItem::linkToCrud('Puissance', 'fa-solid fa-gauge-high', Power::class),
            MenuItem::linkToCrud('Transmission', 'fa-solid fa-timeline', Transmission::class),
            MenuItem::linkToCrud('Type de Véhicule', 'fa-solid fa-truck-pickup', TypeOfVehicles::class),
        ]);
    }
}
