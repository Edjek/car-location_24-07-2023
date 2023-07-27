<?php

namespace App\Controller\Front;

use App\Controller\AbstractController;
use App\Model\Car;

class ReservationController extends AbstractController
{
    public function index(array $params): void
    {
        $car = new Car();
        $id = $params['id'];
        $carById = $car->getCarById($id);
        require_once '../templates/front/reservation.php';
    }
}
