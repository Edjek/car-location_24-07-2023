<?php

namespace App\Controller\Front;

class HomeController
{
    public function index()
    {
        require_once '../templates/front/home.php';
    }
}
