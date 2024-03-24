<?php

namespace App\Controller;

use App\Entity\Pizza;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class GuestController extends AbstractController {

    #[Route('/', name: 'home')]
    public function defaultPage(EntityManagerInterface $em) {
        $pizza = $em->getRepository(Pizza::class)->findAll();
        return $this->render('/pages/base.html.twig', ['pizza' => $pizza]);
    }
}
