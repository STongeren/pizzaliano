<?php

namespace App\Controller;

use App\Entity\Order;
use App\Form\OrderType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OrderController extends AbstractController
{
    #[Route('/order', name: 'submit_order', methods: ['GET', 'POST'])]
    public function submitOrder(Request $request): Response
    {
        $form = $this->createForm(OrderType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Add flash message
            $this->addFlash('success', 'Order is placed successfully!');

            // Redirect to the homepage
            return $this->redirectToRoute('home');
        }

        return $this->render('pages/order/submit.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
