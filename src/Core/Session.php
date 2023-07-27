<?php

namespace App\Core;

class Session
{
    public static function setFlashMessage(string $message)
    {
        $_SESSION['message'] = $message;
    }

    public static function getMessage()
    {
        if(isset($_SESSION['message'])){
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        }
    }
}
