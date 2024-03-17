<?php
// src/Controller/CategoriesShow.php

namespace App\Controller;

use App\Entity\Category;
use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoriesShow extends AbstractController
{
    private $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    #[Route('/category/show/{id}', name: 'category_show')]
    public function show(int $id): Response
    {
        // Retrieve the category object by ID
        $category = $this->categoryRepository->find($id);

        // If category not found, return a 404 response
        if (!$category) {
            throw $this->createNotFoundException('Category not found');
        }

        // Debugging: Dump category object to see its properties
        dump($category);

        // Render the template and pass both ID and name as variables
        return $this->render('pages/categoriesshow.html.twig', [
            'id' => $id,
            'name' => $category->getName(), // Assuming the name property exists in Category entity
        ]);
    }
}