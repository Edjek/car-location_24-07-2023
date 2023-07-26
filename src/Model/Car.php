<?php

namespace App\Model;

use App\Model\AbstractModel;

class Car extends AbstractModel
{
    public function getCars()
    {
        $stmt = $this->pdo->prepare('SELECT * FROM car');
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getCarById($id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM car WHERE id = :id;');
        $stmt->execute([
            ':id' => $id
        ]);
        return $stmt->fetch();
    }
}
