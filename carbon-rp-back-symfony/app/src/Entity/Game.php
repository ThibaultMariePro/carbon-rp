<?php

namespace App\Entity;

use App\Repository\GameRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GameRepository::class)]
class Game
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\ManyToMany(targetEntity: Player::class, inversedBy: 'games')]
    private Collection $players;

    #[ORM\OneToMany(mappedBy: 'universe', targetEntity: CharacterSheet::class)]
    private Collection $characterSheets;

    #[ORM\OneToMany(mappedBy: 'game', targetEntity: Character::class)]
    private Collection $characters;

    public function __construct()
    {
        $this->players = new ArrayCollection();
        $this->characterSheets = new ArrayCollection();
        $this->characters = new ArrayCollection();
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

    /**
     * @return Collection<int, Player>
     */
    public function getPlayers(): Collection
    {
        return $this->players;
    }

    public function addPlayer(Player $player): static
    {
        if (!$this->players->contains($player)) {
            $this->players->add($player);
        }

        return $this;
    }

    public function removePlayer(Player $player): static
    {
        $this->players->removeElement($player);

        return $this;
    }

    /**
     * @return Collection<int, CharacterSheet>
     */
    public function getCharacterSheets(): Collection
    {
        return $this->characterSheets;
    }

    public function addCharacterSheet(CharacterSheet $characterSheet): static
    {
        if (!$this->characterSheets->contains($characterSheet)) {
            $this->characterSheets->add($characterSheet);
            $characterSheet->setUniverse($this);
        }

        return $this;
    }

    public function removeCharacterSheet(CharacterSheet $characterSheet): static
    {
        if ($this->characterSheets->removeElement($characterSheet)) {
            // set the owning side to null (unless already changed)
            if ($characterSheet->getUniverse() === $this) {
                $characterSheet->setUniverse(null);
            }
        }

        return $this;
    }


    public function __toString(): string
    {
        return $this->getName();
    }

    /**
     * @return Collection<int, Character>
     */
    public function getCharacters(): Collection
    {
        return $this->characters;
    }

    public function addCharacter(Character $character): static
    {
        if (!$this->characters->contains($character)) {
            $this->characters->add($character);
            $character->setGame($this);
        }

        return $this;
    }

    public function removeCharacter(Character $character): static
    {
        if ($this->characters->removeElement($character)) {
            // set the owning side to null (unless already changed)
            if ($character->getGame() === $this) {
                $character->setGame(null);
            }
        }

        return $this;
    }
}
