<?php

namespace App\Model;

use App\Model\AbstractModel;

class User extends AbstractModel
{
    public function saveUser($pseudo, $email, $pswd)
    {
        $stmt = $this->pdo->prepare('INSERT INTO user (username, email, mdp) VALUES (:username, :email, :pswd)');
        $stmt->execute([
            ':username' => $pseudo,
            ':email' => $email,
            ':pswd' => $pswd,

        ]);
    }
}