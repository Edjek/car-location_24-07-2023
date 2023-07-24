<?php

// Démarrer la session en premier
session_start();

use \App\Core\Router;

require_once '../src/Core/Router.php';

$router = new Router();
$router->execute();