<?php
// src/Controller/CategoriesShowController.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoriesShow extends AbstractController
{
    #[Route('/category/show/{id}', name: 'category_show')]
    public function show(int $id): Response
    {
        // Redirect to categories show base page with category ID as a parameter
        return $this->render('pages/categoriesshow.html.twig', ['id' => $id]);
    }
}
