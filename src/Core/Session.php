<?php

namespace App\Core;

class Session
{
    public static function setFlashMessage(string $message, string $type)
    {
        $_SESSION['message'] =
            '<div class="alert alert-' . $type . ' alert-dismissible fade show" role="alert">' . $message .
            '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }

    public static function getMessage()
    {
        if (isset($_SESSION['message'])) {
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        }
    }
}
