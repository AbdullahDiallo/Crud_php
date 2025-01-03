<?php

namespace App\Models;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use App\Models\Equipment;
use Doctrine\ORM\EntityManagerInterface;

#[ORM\Entity]
#[ORM\Table(name: 'animals')]
class Animal
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    private int $id;

    #[ORM\Column(type: 'string')]
    private string $type;

    #[ORM\Column(type: 'integer')]
    private int $age;

    #[ORM\Column(type: 'string')]
    private string $sante;


    #[ORM\ManyToOne(targetEntity: Equipment::class)]
    #[ORM\JoinColumn(name: 'id_equipement', referencedColumnName: 'id', nullable: true)]
    private ?Equipment $equipment;

    public function getId(): int
    {
        return $this->id;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): void
    {
        $this->type = $type;
    }

    public function getAge(): int
    {
        return $this->age;
    }

    public function setAge(int $age): void
    {
        $this->age = $age;
    }

    public function getSante(): string
    {
        return $this->sante;
    }

    public function setSante(string $sante): void
    {
        $this->sante = $sante;
    }
    public function getEquipmentName(): ?string
    {
        return $this->equipment ? $this->equipment->getNom() : null;
    }


    public function getEquipment(): ?Equipment
    {
        return $this->equipment;
    }

    public function setEquipment(?Equipment $equipment): void
    {
        $this->equipment = $equipment;
    }


    public static function create(EntityManagerInterface $entityManager, array $data): void
    {
        $equipmentRepository = $entityManager->getRepository(Equipment::class);
        $equipment = $data['id_equipement'] ? $equipmentRepository->find($data['id_equipement']) : null;

        if ($equipment || $data['id_equipement'] === null) {
            $animal = new Animal();
            $animal->setType($data['type']);
            $animal->setAge($data['age']);
            $animal->setSante($data['sante']);

            $animal->setEquipment($equipment);

            $entityManager->persist($animal);
            $entityManager->flush();
        } else {
            throw new \Exception("Equipment not found");
        }
    }

    public static function update(EntityManagerInterface $entityManager, int $id, array $data): void
    {
        $animal = $entityManager->find(Animal::class, $id);
        $equipmentRepository = $entityManager->getRepository(Equipment::class);
        $equipment = $data['id_equipement'] ? $equipmentRepository->find($data['id_equipement']) : null;

        if ($animal && ($equipment || $data['id_equipement'] === null)) {
            $animal->setType($data['type']);
            $animal->setAge($data['age']);
            $animal->setSante($data['sante']);

            $animal->setEquipment($equipment);

            $entityManager->flush();
        } else {
            throw new \Exception("Animal or Equipment not found");
        }
    }

    public static function delete(EntityManagerInterface $entityManager, int $id): void
    {
        $animal = $entityManager->find(Animal::class, $id);
        if ($animal) {
            $entityManager->remove($animal);
            $entityManager->flush();
        } else {
            throw new \Exception("Animal not found");
        }
    }
}
