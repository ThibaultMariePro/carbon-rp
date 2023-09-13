<?php

namespace App\Entity;

use App\Repository\ItemPropertyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ItemPropertyRepository::class)]
class ItemProperty
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $value = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description = null;

    #[ORM\ManyToMany(targetEntity: Item::class, inversedBy: 'itemProperties')]
    private Collection $relatedItem;

    public function __construct()
    {
        $this->relatedItem = new ArrayCollection();
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

    public function getValue(): ?string
    {
        return $this->value;
    }

    public function setValue(string $value): static
    {
        $this->value = $value;

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

    /**
     * @return Collection<int, Item>
     */
    public function getRelatedItem(): Collection
    {
        return $this->relatedItem;
    }

    public function addRelatedItem(Item $relatedItem): static
    {
        if (!$this->relatedItem->contains($relatedItem)) {
            $this->relatedItem->add($relatedItem);
        }

        return $this;
    }

    public function removeRelatedItem(Item $relatedItem): static
    {
        $this->relatedItem->removeElement($relatedItem);

        return $this;
    }
}
