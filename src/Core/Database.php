<?php

namespace App\Core;

use PDOException;

class Database
{
    private static $host = 'localhost';
    private static $dbname = 'car_location';
    private static $username = 'root';
    private static $password = '';
    private static $connection;

    public static function connect()
    {
        try {
            self::$connection = new \PDO(
                'mysql:host=' . self::$host . ';dbname=' . self::$dbname . ';charset=utf8',
                self::$username,
                self::$password,
                [\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION],
            );
        } catch(\PDOException $e){
            die("Erreur de connexion à la base de donnée" . $e->getMessage());
        }
    }

    public static function getConnection()
    {
        return self::$connection;
    }
}
