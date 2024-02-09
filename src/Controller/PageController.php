<?php

namespace App\Controller;

use App\Entity\Review;
use App\Form\ReviewType;
use App\Repository\ReviewRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\RepairServiceRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PageController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(RepairServiceRepository $repoService, ReviewRepository $repoReview, Request $request, EntityManagerInterface $em): Response
    {
        //Repair service
        $repairServices = $repoService->findAll();

        //best review
        $bestreview = $repoReview->findBy(['isvalidated' => true], ['rate' => 'DESC'], 3);

        //review form
        $review = new Review();
        $review->setIsvalidated(false);
        $form = $this->createForm(ReviewType::class, $review);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($review);
            $em->flush();
        }


        return $this->render('home/index.html.twig', [
            'repairServices' => $repairServices,
            'bestReviews' => $bestreview,
            'form' => $form
        ]);
    }

    #[Route('/contact', name: 'app_contact')]
    public function contact(): Response
    {
        return $this->render('contact/index.html.twig', []);
    }
}
