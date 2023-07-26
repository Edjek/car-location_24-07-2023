<?php

namespace App\Model;

use App\Core\Database;

abstract class AbstractModel
{
    protected $pdo;

    public function __construct()
    {
        $this->pdo = Database::getConnection();
    }
}
