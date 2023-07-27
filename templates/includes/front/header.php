<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CDN Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>

    <header>
        <nav class="navbar navbar-expand-sm bg-primary" data-bs-theme="dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-sm-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/car-location/">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/car-location/contact">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/car-location/inscription">Inscription</a>
                        </li>
                        <!-- Creer la route -->
                        <!--  /connexion  => UserController => connexion() -->

                        <!-- Usercontroller => connexion() -->
                        <!-- Page de formulaire de connexion -->
                        <!-- action /car-location/connect -->

                        <!-- Methode quand on appuye sur Envoyer -->
                        <!-- Creer la route Pour traiter le formulaire -->
                        <!-- /connect  => UserController => connect() -->

                        <!-- Usercontroller => connect() -->

                        <!-- User => getUserConnexion -->
                        <!-- WHERE email =  AND mdp =  -->
                        <!-- if -->
                        <li class="nav-item">
                            <a class="nav-link" href="/car-location/connexion">Connexion</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main>
    <?php

    App\Core\Session::getMessage();
