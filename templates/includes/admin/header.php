<?php
if (!isset($_SESSION['LOGGED_ADMIN'])) {
    header('Location:/car-location/');
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boxshadow - Location de voitures</title>
    <!-- CDN Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body>

    <header>
        <nav class="navbar navbar-expand-sm bg-primary" data-bs-theme="dark">
            <div class="container">
                <a class="navbar-brand" href="/car-location/">Boxshadow</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-sm-0">
                        <?php
                        if (isset($_SESSION['LOGGED_ADMIN'])) {
                        ?>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="/car-location/backoffice">Backoffice</a>
                            </li>
                        <?php
                        }
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/car-location/">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/car-location/contact">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/car-location/inscription">Inscription</a>
                        </li>
                        <?php
                        if (isset($_SESSION['LOGGED_ID'])) {
                        ?>
                            <li class="nav-item">
                                <a class="nav-link" href="/car-location/deconnexion">Deconnexion</a>
                            </li>
                        <?php
                        } else {
                        ?>
                            <li class="nav-item">
                                <a class="nav-link" href="/car-location/connexion">Connexion</a>
                            </li>
                        <?php
                        }

                        ?>

                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <?php

        App\Core\Session::getFlashMessage();
        var_dump($_SESSION);
