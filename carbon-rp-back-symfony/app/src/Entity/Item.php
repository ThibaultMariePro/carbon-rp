<?php

namespace App\Entity;

use App\Repository\ItemRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ItemRepository::class)]
class Item
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description = null;

    #[ORM\ManyToOne(inversedBy: 'items')]
    private ?Inventory $location = null;

    #[ORM\ManyToMany(targetEntity: ItemProperty::class, mappedBy: 'relatedItem')]
    private Collection $itemProperties;

    public function __construct()
    {
        $this->itemProperties = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getLocation(): ?Inventory
    {
        return $this->location;
    }

    public function setLocation(?Inventory $location): static
    {
        $this->location = $location;

        return $this;
    }

    /**
     * @return Collection<int, ItemProperty>
     */
    public function getItemProperties(): Collection
    {
        return $this->itemProperties;
    }

    public function addItemProperty(ItemProperty $itemProperty): static
    {
        if (!$this->itemProperties->contains($itemProperty)) {
            $this->itemProperties->add($itemProperty);
            $itemProperty->addRelatedItem($this);
        }

        return $this;
    }

    public function removeItemProperty(ItemProperty $itemProperty): static
    {
        if ($this->itemProperties->removeElement($itemProperty)) {
            $itemProperty->removeRelatedItem($this);
        }

        return $this;
    }
}
