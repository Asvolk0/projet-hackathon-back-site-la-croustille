<?php

namespace App\Entity;

use App\Repository\IngredientsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IngredientsRepository::class)]
class Ingredients
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $ingredient;

    #[ORM\ManyToOne(targetEntity: Recipe::class, inversedBy: 'ingredients')]
    #[ORM\JoinColumn(nullable: false, onDelete: "CASCADE")]
    private $recipe;

    #[ORM\ManyToOne(targetEntity: Unity::class, inversedBy: 'ingredients')]
    #[ORM\JoinColumn(nullable: false)]
    private $unity;

    #[ORM\Column(type: 'integer')]
    private $quantity;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIngredient(): ?string
    {
        return $this->ingredient;
    }

    public function setIngredient(string $ingredient): self
    {
        $this->ingredient = $ingredient;

        return $this;
    }

    public function getRecipe(): ?recipe
    {
        return $this->recipe;
    }

    public function setRecipe(?recipe $recipe): self
    {
        $this->recipe = $recipe;

        return $this;
    }

    public function getUnity(): ?Unity
    {
        return $this->unity;
    }

    public function setUnity(?Unity $unity): self
    {
        $this->unity = $unity;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }
}
