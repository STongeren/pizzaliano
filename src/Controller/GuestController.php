<?php

namespace App\Controller;

use App\Entity\Brood;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class GuestController extends AbstractController {

    #[Route('/', name: 'home')]
    public function defaultPage(EntityManagerInterface $em) {
        $brood = $em->getRepository(Brood::class)->findAll();
        return $this->render('/pages/base.html.twig', ['brood' => $brood]);
    }
}
