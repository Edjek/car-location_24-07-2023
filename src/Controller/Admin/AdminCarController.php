<?php

namespace App\Controller\Admin;

use App\Controller\AbstractController;
use App\Model\Car;
use App\Core\Session;

class AdminCarController  extends AbstractController
{
    public function index(): void
    {
        $car = new Car();
        $cars = $car->getCars();
        require_once '../templates/admin/cars.php';
    }

    public function carForm($params)
    {
        $car = new Car();
        $carDetails = $car->getCarById($params['id']);
        require_once '../templates/admin/car-form.php';
    }

    public function updateCar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $model = trim($_POST['name']);
            $description = trim($_POST['description']);
            $price = trim($_POST['price']);
            $id = $_POST['id'];


            if (isset($_FILES['img']) && $_FILES['img']['error'] == 0) {
                $allowed = ['jpg' => 'image/jpg', 'jpeg' => 'image/jpeg', 'gif' => 'image/gif'];
                $fileName = $_FILES['img']['name'];
                $fileType = $_FILES['img']['type'];
                $fileSize = $_FILES['img']['size'];

                $extension = pathinfo($fileName, PATHINFO_EXTENSION);

                if (!array_key_exists($extension, $allowed)) {
                    Session::setFlashMessage('Le format de votre fichier n\'est pas correct ! (jpg, jpeg, gif)', 'warning');
                    header('Location: /car-location/backoffice/update-car/' . $id);
                    exit();
                }

                $maxsize = 5 * 1024 * 1024;
                if ($fileSize > $maxsize) {
                    Session::setFlashMessage('Votre fichier est trop volumineux', 'warning');
                    header('Location: /car-location/backoffice/update-car/' . $id);
                    exit();
                }

                if (in_array($fileType, $allowed)) {
                    if (file_exists('./img/' . $fileName)) {
                        Session::setFlashMessage('Le fichier a déjà été téléchargé', 'warning');
                        header('Location: /car-location/backoffice/update-car/' . $id);
                        exit();
                    } else {
                        move_uploaded_file($_FILES['img']['tmp_name'], './img/upload/' . $_FILES['img']['name']);
                        Session::setFlashMessage('Une voiture viens d\' être modifié !', 'success');
                        header('Location: /car-location/backoffice/cars');
                        exit();
                    }
                }
            } else {
                Session::setFlashMessage('Une erreur dans le fichier image c\'est produite, veuillez recommencer', 'warning');
                header('Location: /car-location/backoffice/update-car/' . $id);
                exit();
            }

            if (empty($model)) {
                Session::setFlashMessage('Veuillez remplir le champs model :', 'warning');
                header('Location: /car-location/backoffice/update-car/' . $id);
                exit();
            }
            // creer un method updateCar()
            $car = new Car();
            $car->updateCar($id, $model, $description, $price);
            Session::setFlashMessage('Une voiture viens d\' être modifié !', 'success');
            header('Location: /car-location/backoffice/cars');
            exit();
        } else {
            header('Location: /car-location/backoffice/cars');
            exit();
        }
    }
}
