<?php

namespace App\Controller\Front;

use \App\Model\Car;

class HomeController
{
    public function index()
    {
        $cars = new Car();
        $cars->getCars();
        require_once '../templates/front/home.php';
    }
}
