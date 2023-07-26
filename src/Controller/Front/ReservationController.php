<?php

namespace App\Controller\Front;

use App\Controller\AbstractController;
use App\Model\Car;

class ReservationController extends AbstractController
{
    public function index($params)
    {
        $car = new Car();
        $id = $params['id'];
        $carById = $car->getCarById($id);
        var_dump($carById);
        require_once '../templates/front/reservation.php';
    }
}
