<?php

namespace App\Controller\Front;

use App\Controller\AbstractController;
use App\Model\Car;

class HomeController extends AbstractController
{
    public function index()
    {
        $car = new Car();
        $cars = $car->getCars($this->pdo);
        require_once '../templates/front/home.php';
    }
}
