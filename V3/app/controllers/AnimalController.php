<?php

namespace App\Controllers;


use Doctrine\ORM\EntityManager;
use App\Models\Animal;
use Jenssegers\Blade\Blade;
use App\Models\Equipment;

class AnimalController
{
    private $entityManager;
    protected $blade;

    public function __construct(EntityManager $entityManager, $blade)
    {
        $this->entityManager = $entityManager;
        $this->blade = $blade;
    }

    public function index()
    {
        global $twig;
        $animalRepository = $this->entityManager->getRepository(Animal::class);
        $animals = $animalRepository->findAll();
        echo $twig->render('animal/home.twig', ['animals' => $animals]);
    }


    public function create()
    {
        global $twig;
        $equipmentRepository = $this->entityManager->getRepository(Equipment::class);
        $equipments = $equipmentRepository->findAll();
        echo $twig->render('animal/create.twig', ['equipments' => $equipments]);
    }

    public function store($data)
    {
        Animal::create($this->entityManager, $data);
        header('Location: /animal');
    }

    public function edit(int $id)
    {
        global $twig;
        $equipmentRepository = $this->entityManager->getRepository(Equipment::class);
        $equipments = $equipmentRepository->findAll();
        $animal = $this->entityManager->find(Animal::class, $id);
        echo $twig->render('animal/edit.twig', ['animal' => $animal, 'equipments' => $equipments]);
    }
    public function update($id, $data)
    {
        Animal::update($this->entityManager, $id, $data);
        header('Location: /animal');
    }

    public function delete($id)
    {
        Animal::delete($this->entityManager, $id);
        header('Location: /animal');
    }
}
