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
                Session::setFlashMessage('Le champs pseudo est vide !', 'warning');
                header('Location:/car-location/inscription'); // Redirection vers le formulaire
                exit();
            }

            if (empty($email)) {
                Session::setFlashMessage('Le champs email est vide !', 'warning');
                header('Location:/car-location/inscription'); // Redirection vers le formulaire
                exit();
            }

            if (empty($pswd)) {
                Session::setFlashMessage('Le champs mot de passe est vide !', 'warning');
                header('Location:/car-location/inscription'); // Redirection vers le formulaire
                exit();
            }

            $user = new User();
            if ($user->getUserByEmail($email)) {
                Session::setFlashMessage('Cet email est déjà utilisé !', 'danger');
                header('Location:/car-location/inscription'); // Redirection vers le formulaire
                exit();
            }

            $pswd = password_hash($pswd, PASSWORD_DEFAULT);
            $user->saveUser($pseudo, $email, $pswd);
            Session::setFlashMessage('Vous êtes bien inscrit !', 'success');
            header('Location: /car-location/');
            exit();
        }
    }

    public function connexion()
    {
        require_once '../templates/front/form-connexion.php';
    }

    public function connect()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim($_POST['email']);
            $pswd = trim($_POST['pswd']);

            if (empty($email)) {
                Session::setFlashMessage('Votre champs email est vide !', 'warning');
                header('Location: /car-location/connexion');
                exit();
            }

            if (empty($pswd)) {
                Session::setFlashMessage('Votre champs mot de passe est vide !', 'warning');
                header('Location: /car-location/connexion');
                exit();
            }

            $user = new User();
            $user = $user->getUserByEmail($email);
            if ($user === false) {
                Session::setFlashMessage('Votre email n\'existe pas !', 'warning');
                header('Location: /car-location/connexion');
                exit();
            }

            if(password_verify($pswd, $user['mdp'])){
                // Creer une method static createSession(User $user) dans la class Session
                    // $_SESSION['LOGGED_USERNAME] = $user['username'];
                    // $_SESSION['LOGGED_ID'] = $user['id']
                    // if($user['admin'] === true){
                        // $_SESSION['LOGGED_ADMIN'] = true
                    // }


                // Appeler la methode et lui passer des vraies valeurs aux parametre

            } else {
                Session::setFlashMessage('Votre mot de passe est erroné !', 'warning');
                header('Location: /car-location/connexion');
                exit();
            }
            var_dump($user);
        }
    }
}
