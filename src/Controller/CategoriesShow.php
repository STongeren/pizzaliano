<?php
// src/Controller/CategoriesShow.php

namespace App\Controller;

use App\Entity\Pizza;
use App\Repository\PizzaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
    public function show(int $id, Request $request): Response
    {
        // Retrieve the pizzas belonging to the category with the given ID
        $pizzas = $this->pizzaRepository->findBy(['category_id' => $id]);

        // If no pizzas found, return a 404 response
        if (empty($pizzas)) {
            throw $this->createNotFoundException('Pizzas not found for this category');
        }

        // Handle adding pizza to cart if requested
        if ($request->isMethod('POST') && $request->request->has('pizza_id')) {
            $pizzaId = $request->request->getInt('pizza_id');
            $pizza = $this->pizzaRepository->find($pizzaId);

            if ($pizza) {
                // Get or initialize the shopping cart in session
                $cart = $request->getSession()->get('cart', []);

                // Add pizza to the cart
                if (!isset($cart[$pizzaId])) {
                    $cart[$pizzaId] = [
                        'name' => $pizza->getName(),
                        'price' => $pizza->getPrice(),
                        'quantity' => 1,
                    ];
                } else {
                    $cart[$pizzaId]['quantity']++;
                }

                // Store the updated cart back in session
                $request->getSession()->set('cart', $cart);

                $this->addFlash('success', 'Pizza added to cart.');
                return $this->redirectToRoute('category_show', ['id' => $id]);
            }
        }

        // Render the template and pass pizzas as variables
        return $this->render('pages/categoriesshow.html.twig', [
            'pizzas' => $pizzas,
        ]);
    }
}
