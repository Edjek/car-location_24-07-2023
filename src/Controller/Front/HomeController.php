<?php

namespace App\Controller\Front;

use App\Controller\AbstractController;
use App\Model\Car;

class HomeController extends AbstractController
{
    public function index(): void
    {
        $car = new Car();
        $cars = $car->getCars();
        require_once '../templates/front/home.php';
    }
}
