<?php

namespace App\Entity;

use App\Repository\InventoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InventoryRepository::class)]
class Inventory
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToMany(targetEntity: Character::class, inversedBy: 'inventories')]
    private Collection $owner;

    #[ORM\Column(nullable: true)]
    private ?int $maxSize = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'location', targetEntity: Item::class)]
    private Collection $items;

    public function __construct()
    {
        $this->owner = new ArrayCollection();
        $this->items = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Character>
     */
    public function getOwner(): Collection
    {
        return $this->owner;
    }

    public function addOwner(Character $owner): static
    {
        if (!$this->owner->contains($owner)) {
            $this->owner->add($owner);
        }

        return $this;
    }

    public function removeOwner(Character $owner): static
    {
        $this->owner->removeElement($owner);

        return $this;
    }

    public function getMaxSize(): ?int
    {
        return $this->maxSize;
    }

    public function setMaxSize(?int $maxSize): static
    {
        $this->maxSize = $maxSize;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, Item>
     */
    public function getItems(): Collection
    {
        return $this->items;
    }

    public function addItem(Item $item): static
    {
        if (!$this->items->contains($item)) {
            $this->items->add($item);
            $item->setLocation($this);
        }

        return $this;
    }

    public function removeItem(Item $item): static
    {
        if ($this->items->removeElement($item)) {
            // set the owning side to null (unless already changed)
            if ($item->getLocation() === $this) {
                $item->setLocation(null);
            }
        }

        return $this;
    }
}
