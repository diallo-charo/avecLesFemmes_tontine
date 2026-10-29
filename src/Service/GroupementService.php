<?php
namespace App\Service;

use App\Repository\GroupementRepository;

class GroupementService {
    public function __construct(private readonly GroupementRepository $repo)
    {
        
    }

    public function getAllGroupement() {
        return $this->repo->findAll();
    }

    public function getGroupementById(int $id) {
        return $this->repo->find($id);
    }

    public function getGroupementByName(string $name) {
        return $this->repo->findOneBy(['nom' => $name]);
    }
}