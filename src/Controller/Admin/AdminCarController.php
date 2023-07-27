<?php

namespace App\Controller\Admin;

use App\Controller\AbstractController;
use App\Model\Car;

class AdminCarController  extends AbstractController
{
    public function index(): void
    {
        $car = new Car();
        $cars = $car->getCars();
        require_once '../templates/admin/cars.php';
    }
}
