<?php

namespace App\Controller\Front;

use \App\Model\Car;

class HomeController
{
    public function index()
    {
        // Créer une class Car dans Model avec un namespace
            // Method public getCars()
        $cars = new Car();
        $cars->getCars();
        require_once '../templates/front/home.php';
    }
}
