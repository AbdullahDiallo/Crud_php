<?php

namespace App\Controllers;

use App\Models\Equipment;

class EquipmentController
{
    private $entityManager;
    private $blade;

    public function __construct($entityManager)
    {
        $this->entityManager = $entityManager;
        $this->blade = require_once __DIR__ . '/../config/bootstrap.php';
    }

    public function index()
    {
        global $twig;
        $equipments = $this->entityManager->getRepository(Equipment::class)->findAll();
        echo $twig->render('equipment/home.twig', ['equipments' => $equipments]);
    }

    public function create()
    {
        global $twig;
        echo $twig->render('equipment/create.twig');
    }

    public function store($data)
    {
        $equipment = new Equipment();
        $equipment->create($this->entityManager, $data);
        header('Location: /equipment');
    }

    public function edit($id)
    {
        global $twig;
        $equipment = $this->entityManager->find(Equipment::class, $id);
        echo $twig->render('equipment/edit.twig', ['equipment' => $equipment]);
    }

    public function update($id, $data)
    {
        $equipment = $this->entityManager->find(Equipment::class, $id);
        $equipment->update($this->entityManager, $data);
        header('Location: /equipment');
    }

    public function delete($id)
    {
        $equipment = $this->entityManager->find(Equipment::class, $id);
        if ($equipment) {
            $equipment->delete($this->entityManager);
        }
        header('Location: /equipment');
    }
}
