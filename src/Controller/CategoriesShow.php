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

    #[Route('/cart/remove', name: 'remove_from_cart', methods: ['POST'])]
    public function removeFromCart(Request $request): Response
    {
        $itemId = $request->request->getInt('item_id');
        $cart = $request->getSession()->get('cart', []);

        if (isset($cart[$itemId])) {
            unset($cart[$itemId]);
            $request->getSession()->set('cart', $cart);
        }

        // Redirect back to the same page after removing item from cart
        return $this->redirectToRoute('category_show', ['id' => $request->query->getInt('category_id')]);
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
                // Get the cart from session or initialize it if not exists
                $cart = $request->getSession()->get('cart', []);
    
                // Add pizza to cart
                if (isset($cart[$pizzaId])) {
                    $cart[$pizzaId]['quantity']++;
                } else {
                    $cart[$pizzaId] = [
                        'name' => $pizza->getName(),
                        'price' => $pizza->getPrice(),
                        'quantity' => 1,
                    ];
                }
    
                // Store cart in session
                $request->getSession()->set('cart', $cart);
            }
    
            // Redirect back to the same page to prevent form resubmission
            return $this->redirectToRoute('category_show', ['id' => $id]);
        }
    
        // Retrieve cart items from session
        $cartItems = $request->getSession()->get('cart', []);
    
        return $this->render('pages/categoriesshow.html.twig', [
            'id' => $id, // Pass the category ID to the template
            'pizzas' => $pizzas,
            'cartItems' => $cartItems,
        ]);
    }
}
