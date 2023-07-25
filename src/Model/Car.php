<?php

namespace App\Model;

class Car
{
    public function getCars(\PDO $pdo)
    {
        $stmt = $pdo->prepare('SELECT * FROM car');
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
