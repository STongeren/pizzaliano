<?php
// src/Controller/CategoriesShow.php

namespace App\Controller;

use App\Entity\Pizza;
use App\Repository\PizzaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoriesShow extends AbstractController
{
    private $pizzaRepository;

    public function __construct(PizzaRepository $pizzaRepository)
    {
        $this->pizzaRepository = $pizzaRepository;
    }

    #[Route('/category/show/{id}', name: 'category_show')]
    public function show(int $id): Response
    {
        // Retrieve the pizzas belonging to the category with the given ID
        $pizzas = $this->pizzaRepository->findBy(['category_id' => $id]);

        // If no pizzas found, return a 404 response
        if (empty($pizzas)) {
            throw $this->createNotFoundException('Pizzas not found for this category');
        }

        // Render the template and pass pizzas as variables
        return $this->render('pages/categoriesshow.html.twig', [
            'pizzas' => $pizzas,
        ]);
    }
}
