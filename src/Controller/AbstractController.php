<?php

namespace App\Controller;

use App\Core\Database;

abstract class AbstractController
{
    // creer une propriete privee $pdo
    protected \PDO $pdo;

    // creer un constructor vide
    public function __construct()
    {
        $this->pdo = Database::getConnection();
    }
}
