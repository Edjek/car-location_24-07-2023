<?php

namespace App\Core;

use App\Controller\Front\HomeController;
use App\Controller\Front\ContactController;
use App\Controller\Front\CarController;
use App\Controller\Front\ReservationController;
use App\Controller\Front\UserController;

class Router
{
    private array $routes; // Tableau associatif pour stocker les routes et les fonction associés
    private $currentController; // Stock le contrôleur actuel pour l'action demandé

    public function __construct()
    {
        // Ajoute des routes dans le constructeur, donc à l'initialisation de l'objet
        $this->add_route('/', function () {
            $this->currentController = new HomeController(); // Créé une instance du contrôleur d'accueil
            $this->currentController->index(); // Appelle la méthode index du contrôleur d'accueil
        });
        // Route pour la page contact avec un paramètre id
        $this->add_route('/contact/test/{id}', function ($params) { // On peut passer les éventuels paramètres à la fonction
            $this->currentController = new ContactController();
            $this->currentController->index($params);
        });
        $this->add_route('/contact', function () {
            $this->currentController = new ContactController();
            $this->currentController->saveForm();
        });
        $this->add_route('/car', function ($params) {
            $this->currentController = new CarController();
            $this->currentController->index($params);
        });
        $this->add_route('/reservation/{id}', function ($params) {
            $this->currentController = new ReservationController();
            $this->currentController->index($params);
        });
        $this->add_route('/inscription', function () {
            $this->currentController = new UserController();
            $this->currentController->index();
        });
        $this->add_route('/save-user', function () {
            $this->currentController = new UserController();
            $this->currentController->saveUser();
        });
        $this->add_route('/connexion', function () {
            $this->currentController = new UserController();
            $this->currentController->connexion();
        });
        $this->add_route('/connect', function () {
            $this->currentController = new UserController();
            $this->currentController->connect();
        });
    }

    private function add_route(string $route, callable $closure)
    {
        // Convertit la route en une expression régulière pour une correspondance flexible en url et paramètre
        $pattern = str_replace('/', '\/', $route); // Échappe les barres obliques pour la regex
        $pattern = preg_replace('/\{(\w+)\}/', '(?P<$1>[^\/]+)',  $pattern); // Remplace les parties entre accolade par des groupes de capture (conserve les paramètres)
        $pattern = '/^' . $pattern . '$/'; // Ajoute les délimiteurs de début et de fin de la regex
        $this->routes[$pattern] = $closure; // Stock la regex de la route et la fonction associée dans le tableau des routes
    }

    public function execute()
    {
        $requestUri = $_SERVER['REQUEST_URI']; // Récupère l'URL de la requête
        $finalPath = str_replace('/car-location', '', $requestUri); // Supprime le dossier racine pour obtenir le chemin final

        foreach ($this->routes as $key => $closure) {
            if (preg_match($key, $finalPath, $matches)) {
                array_shift($matches);
                $closure($matches); // Appelle la fonction associée à la route avec les éventuels paramètres capturés
                return;
            }
        }
        require_once '../templates/error-404.php';
    }
}
