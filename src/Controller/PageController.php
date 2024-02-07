<?php

namespace App\Controller;

use App\Repository\RepairServiceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PageController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(RepairServiceRepository $repoService): Response
    {
        $repairServices = $repoService->findAll();

        return $this->render('home/index.html.twig', [
            'repairServices' => $repairServices
        ]);
    }

    #[Route('/contact', name: 'app_contact')]
    public function contact(): Response
    {
        return $this->render('contact/index.html.twig', []);
    }
}
