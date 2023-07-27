<?php

namespace App\Controller\Front;

use App\Controller\AbstractController;
use App\Core\Session;
use App\Model\User;

class UserController extends AbstractController
{
    public function index()
    {
        require_once '../templates/front/form-inscription.php';
    }

    public function saveUser()
    {
        // Verifier si le formulaire a été soumis
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $pseudo = trim($_POST['pseudo']); // Nettoyer les espaces en début et en fin de la chaine de caractère
            $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
            $pswd = trim($_POST['pswd']); // Crypter le mot de passe

            if (empty($pseudo)) {
                Session::setFlashMessage('Le champs pseudo est vide !');
                header('Location:/car-location/inscription'); // Redirection vers le formulaire
                exit();
            }

            if (empty($email)) {
                Session::setFlashMessage('Le champs email est vide !');
                header('Location:/car-location/inscription'); // Redirection vers le formulaire
                exit();
            }

            if (empty($pswd)) {
                Session::setFlashMessage('Le champs mot de passe est vide !');
                header('Location:/car-location/inscription'); // Redirection vers le formulaire
                exit();
            }

            $user = new User();
            if($user->isEmailExist($email)){
                Session::setFlashMessage('Cet email est déjà utilisé !');
                header('Location:/car-location/inscription'); // Redirection vers le formulaire
                exit();
            }

            $pswd = password_hash($pswd, PASSWORD_DEFAULT);
            $user->saveUser($pseudo, $email, $pswd);
        }
    }
}
