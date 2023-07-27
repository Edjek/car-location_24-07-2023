<?php

namespace App\Core;

use App\Model\User;

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

    public static function createSession(array $user)
    {
        $_SESSION['LOGGED_USERNAME'] = $user['username'];
        $_SESSION['LOGGED_ID'] = $user['id'];
        if ($user['admin'] === true) {
            $_SESSION['LOGGED_ADMIN'] = true;
        }
    }
}
