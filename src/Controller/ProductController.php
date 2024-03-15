<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Brood;

class ProductController extends AbstractController
{
    #[Route('/products', name: 'products')]
    public function index(): Response
    {
        // Retrieve brood entities based on category_id
        $broodRepository = $this->getDoctrine()->getRepository(Brood::class);
        $broodByCategory = $broodRepository->findBy(['category_id' => $category_id]); // Replace $category_id with the actual category id

        return $this->render('pages/product.html.twig', [
            'broodByCategory' => $broodByCategory,
        ]);
    }
}
