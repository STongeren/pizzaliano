<?php

namespace App\Entity;

use App\Repository\FesfsefsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FesfsefsRepository::class)]
class Fesfsefs
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 111)]
    private ?string $banana = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBanana(): ?string
    {
        return $this->banana;
    }

    public function setBanana(string $banana): static
    {
        $this->banana = $banana;

        return $this;
    }
}
