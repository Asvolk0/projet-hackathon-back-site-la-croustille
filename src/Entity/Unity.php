<?php

namespace App\Entity;

use App\Repository\UnityRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UnityRepository::class)]
class Unity
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $mesure;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMesure(): ?string
    {
        return $this->mesure;
    }

    public function setMesure(string $mesure): self
    {
        $this->mesure = $mesure;

        return $this;
    }
}
