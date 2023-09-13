<?php

namespace App\Entity;

use App\Repository\CharacterSheetLineRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CharacterSheetLineRepository::class)]
class CharacterSheetLine
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $lineKey = null;

    #[ORM\Column(length: 255)]
    private ?string $lineValue = null;

    #[ORM\ManyToOne(inversedBy: 'characterSheetLines')]
    private ?CharacterSheet $relatedCharacterSheet = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLineKey(): ?string
    {
        return $this->lineKey;
    }

    public function setLineKey(string $lineKey): static
    {
        $this->lineKey = $lineKey;

        return $this;
    }

    public function getLineValue(): ?string
    {
        return $this->lineValue;
    }

    public function setLineValue(string $lineValue): static
    {
        $this->lineValue = $lineValue;

        return $this;
    }

    public function getRelatedCharacterSheet(): ?CharacterSheet
    {
        return $this->relatedCharacterSheet;
    }

    public function setRelatedCharacterSheet(?CharacterSheet $relatedCharacterSheet): static
    {
        $this->relatedCharacterSheet = $relatedCharacterSheet;

        return $this;
    }
}
