<?php

// Démarrer la session en premier
session_start();

use App\Core\Router;
use App\Core\Autoloader;
use App\Core\Database;

require_once '../src/Core/Autoloader.php';

// Appeler la method static register de la class Autoloader
Autoloader::register();
Database::connect();
$router = new Router();
$router->execute();
