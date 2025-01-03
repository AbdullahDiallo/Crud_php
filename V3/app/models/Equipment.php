<?php

namespace App\Models;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use App\Models\Animal;

#[ORM\Entity]
#[ORM\Table(name: 'equipments')]
class Equipment
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string')]
    private string $nom;

    #[ORM\Column(type: 'string')]
    private string $etat;

    #[ORM\Column(type: 'boolean')]
    private bool $disponibilite;

    #[ORM\OneToMany(mappedBy: 'equipment', targetEntity: Animal::class)]
    private Collection $animals;

    public function __construct()
    {
        $this->animals = new ArrayCollection();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    public function getEtat(): string
    {
        return $this->etat;
    }

    public function setEtat(string $etat): void
    {
        $this->etat = $etat;
    }

    public function getDisponibilite(): bool
    {
        return $this->disponibilite;
    }

    public function setDisponibilite(bool $disponibilite): void
    {
        $this->disponibilite = $disponibilite;
    }

    public function getAnimals(): Collection
    {
        return $this->animals;
    }

    public function addAnimal(Animal $animal): void
    {
        if (!$this->animals->contains($animal)) {
            $this->animals->add($animal);
            $animal->setEquipment($this);
        }
    }

    public function removeAnimal(Animal $animal): void
    {
        if ($this->animals->contains($animal)) {
            $this->animals->removeElement($animal);
            if ($animal->getEquipment() === $this) {
                $animal->setEquipment(null);
            }
        }
    }

    public function create($entityManager, $data): void
    {
        $this->setNom($data['nom']);
        $this->setEtat($data['etat']);
        $this->setDisponibilite($data['disponibilite'] === '1');
        $entityManager->persist($this);
        $entityManager->flush();
    }

    public function update($entityManager, $data): void
    {
        $this->setNom($data['nom']);
        $this->setEtat($data['etat']);
        $this->setDisponibilite($data['disponibilite'] === '1');
        $entityManager->flush();
    }

    public function delete($entityManager): void
    {
        $entityManager->remove($this);
        $entityManager->flush();
    }
}
