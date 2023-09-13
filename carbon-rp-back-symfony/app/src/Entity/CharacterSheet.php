<?php

namespace App\Entity;

use App\Repository\CharacterSheetRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CharacterSheetRepository::class)]
class CharacterSheet
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'characterSheets')]
    private ?Character $protagonist = null;

    #[ORM\ManyToOne(inversedBy: 'characterSheets')]
    private ?Player $Owner = null;

    #[ORM\ManyToOne(inversedBy: 'characterSheets')]
    private ?Game $universe = null;

    #[ORM\Column]
    private ?int $pageNumber = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updatedAt = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProtagonist(): ?Character
    {
        return $this->protagonist;
    }

    public function setProtagonist(?Character $protagonist): static
    {
        $this->protagonist = $protagonist;

        return $this;
    }

    public function getOwner(): ?Player
    {
        return $this->Owner;
    }

    public function setOwner(?Player $Owner): static
    {
        $this->Owner = $Owner;

        return $this;
    }

    public function getUniverse(): ?Game
    {
        return $this->universe;
    }

    public function setUniverse(?Game $universe): static
    {
        $this->universe = $universe;

        return $this;
    }

    public function getPageNumber(): ?int
    {
        return $this->pageNumber;
    }

    public function setPageNumber(int $pageNumber): static
    {
        $this->pageNumber = $pageNumber;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeImmutable $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
}
