<?php

// Démarrer la session en premier
session_start();

use \App\Core\Router;
use \App\Core\Autoloader;

require_once '../src/Core/Autoloader.php';

// Appeler la method static register de la class Autoloader
Autoloader::register();
$router = new Router();
$router->execute();
