<?php

namespace App\Controller\Front;

class ContactController
{
    public function index($params)
    {
        echo $params['test'];
    }

    public function saveForm()
    {
    }
}
