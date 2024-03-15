<?php
// src/Controller/CategoriesController.php

namespace App\Controller;

use App\Entity\Category;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoriesController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/categories', name: 'categories')]
    public function index(): Response
    {
        $categories = $this->entityManager->getRepository(Category::class)->findAll();

        return $this->render('pages/categories.html.twig', [
            'categories' => $categories,
        ]);
    }
}
