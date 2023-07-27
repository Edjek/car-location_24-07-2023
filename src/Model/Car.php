<?php

namespace App\Model;

use App\Model\AbstractModel;

class Car extends AbstractModel
{
    public function getCars(): array
    {
        $stmt = $this->pdo->prepare('SELECT * FROM car');
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getCarById(int $id): array
    {
        $stmt = $this->pdo->prepare('SELECT * FROM car WHERE id = :id;');
        $stmt->execute([
            ':id' => $id
        ]);
        return $stmt->fetch();
    }
}
