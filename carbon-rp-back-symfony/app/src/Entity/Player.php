<?php

namespace App\Entity;

use App\Repository\PlayerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlayerRepository::class)]
class Player
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $alias = null;

    #[ORM\OneToMany(mappedBy: 'owner', targetEntity: Character::class)]
    private Collection $characters;

    #[ORM\ManyToMany(targetEntity: Game::class, mappedBy: 'players')]
    private Collection $games;

    #[ORM\OneToMany(mappedBy: 'Owner', targetEntity: CharacterSheet::class)]
    private Collection $characterSheets;

    public function __construct()
    {
        $this->characters = new ArrayCollection();
        $this->games = new ArrayCollection();
        $this->characterSheets = new ArrayCollection();
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

    public function getAlias(): ?string
    {
        return $this->alias;
    }

    public function setAlias(string $alias): static
    {
        $this->alias = $alias;

        return $this;
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
            $character->setOwner($this);
        }

        return $this;
    }

    public function removeCharacter(Character $character): static
    {
        if ($this->characters->removeElement($character)) {
            // set the owning side to null (unless already changed)
            if ($character->getOwner() === $this) {
                $character->setOwner(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Game>
     */
    public function getGames(): Collection
    {
        return $this->games;
    }

    public function addGame(Game $game): static
    {
        if (!$this->games->contains($game)) {
            $this->games->add($game);
            $game->addPlayer($this);
        }

        return $this;
    }

    public function removeGame(Game $game): static
    {
        if ($this->games->removeElement($game)) {
            $game->removePlayer($this);
        }

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
            $characterSheet->setOwner($this);
        }

        return $this;
    }

    public function removeCharacterSheet(CharacterSheet $characterSheet): static
    {
        if ($this->characterSheets->removeElement($characterSheet)) {
            // set the owning side to null (unless already changed)
            if ($characterSheet->getOwner() === $this) {
                $characterSheet->setOwner(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->getAlias();
    }

}
