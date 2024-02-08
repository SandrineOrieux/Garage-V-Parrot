<?php

namespace App\Controller;

use App\Repository\RepairServiceRepository;
use App\Repository\ReviewRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PageController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(RepairServiceRepository $repoService, ReviewRepository $repoReview): Response
    {
        $repairServices = $repoService->findAll();

        $bestreview = $repoReview->findBy(['isvalidated' => true], ['rate' => 'DESC'], 3);


        return $this->render('home/index.html.twig', [
            'repairServices' => $repairServices,
            'bestReviews' => $bestreview
        ]);
    }

    #[Route('/contact', name: 'app_contact')]
    public function contact(): Response
    {
        return $this->render('contact/index.html.twig', []);
    }
}
