<?php

namespace App\Entity;

use App\Repository\RecipeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RecipeRepository::class)]
class Recipe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $title;

    #[ORM\Column(type: 'string', length: 255)]
    private $img;

    #[ORM\Column(type: 'boolean')]
    private $active;

    #[ORM\ManyToOne(targetEntity: type::class, inversedBy: 'recipes')]
    #[ORM\JoinColumn(nullable: false, onDelete: "CASCADE")]
    private $type;

    #[ORM\OneToMany(mappedBy: 'recipe', targetEntity: step::class)]
    private $steps;

    #[ORM\ManyToMany(targetEntity: User::class, mappedBy: 'liked')]
    private $users;

    #[ORM\OneToMany(mappedBy: 'recipe', targetEntity: Ingredients::class)]
    #[ORM\JoinColumn(nullable: false, onDelete: "CASCADE")]
    private $ingredients;

    #[ORM\ManyToMany(targetEntity: User::class, inversedBy: 'recipes')]
    private $fav;

    #[ORM\Column(type: 'integer')]
    private $preparationTime;

    #[ORM\Column(type: 'integer')]
    private $nbPersonne;

    public function __construct()
    {
        $this->steps = new ArrayCollection();
        $this->users = new ArrayCollection();
        $this->ingredients = new ArrayCollection();
        $this->fav = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getImg(): ?string
    {
        return $this->img;
    }

    public function setImg(string $img): self
    {
        $this->img = $img;

        return $this;
    }

    public function getActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(bool $active): self
    {
        $this->active = $active;

        return $this;
    }

    public function getType(): ?type
    {
        return $this->type;
    }

    public function setType(?type $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return Collection<int, step>
     */
    public function getSteps(): Collection
    {
        return $this->steps;
    }

    public function addStep(step $step): self
    {
        if (!$this->steps->contains($step)) {
            $this->steps[] = $step;
            $step->setRecipe($this);
        }

        return $this;
    }

    public function removeStep(step $step): self
    {
        if ($this->steps->removeElement($step)) {
            // set the owning side to null (unless already changed)
            if ($step->getRecipe() === $this) {
                $step->setRecipe(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->addLiked($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->removeElement($user)) {
            $user->removeLiked($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Ingredients>
     */
    public function getIngredients(): Collection
    {
        return $this->ingredients;
    }

    public function addIngredient(Ingredients $ingredient): self
    {
        if (!$this->ingredients->contains($ingredient)) {
            $this->ingredients[] = $ingredient;
            $ingredient->setRecipe($this);
        }

        return $this;
    }

    public function removeIngredient(Ingredients $ingredient): self
    {
        if ($this->ingredients->removeElement($ingredient)) {
            // set the owning side to null (unless already changed)
            if ($ingredient->getRecipe() === $this) {
                $ingredient->setRecipe(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getFav(): Collection
    {
        return $this->fav;
    }

    public function addFav(User $fav): self
    {
        if (!$this->fav->contains($fav)) {
            $this->fav[] = $fav;
        }

        return $this;
    }

    public function removeFav(User $fav): self
    {
        $this->fav->removeElement($fav);

        return $this;
    }

    public function getPreparationTime(): ?int
    {
        return $this->preparationTime;
    }

    public function setPreparationTime(int $preparationTime): self
    {
        $this->preparationTime = $preparationTime;

        return $this;
    }

    public function getNbPersonne(): ?int
    {
        return $this->nbPersonne;
    }

    public function setNbPersonne(int $nbPersonne): self
    {
        $this->nbPersonne = $nbPersonne;

        return $this;
    }
}
