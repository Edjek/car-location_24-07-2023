<?php
require_once '../templates/includes/admin/header.php';
?>
<section class="container py-3 text-center">
    <h1>Backoffice</h1>
    <div>
        <a href="" class="btn btn-dark w-50 my-3">Gestion des utilisateurs</a>
    </div>
    <!-- Creer une routes /backoffice/cars  -->
    <!-- appelera le controlleur AdminCarControlleur -->
    <!-- index() -->
    <!-- affiche templates/admin/cars.php -->
    <div>
        <a href="/car-location/backoffice/cars" class="btn btn-dark w-50 my-3">Gestions des voitures</a>
    </div>
    <div>
        <a href="" class="btn btn-dark w-50 my-3">Gestion des reservations</a>
    </div>
    <div>
        <a href="" class="btn btn-dark w-50 my-3">Gestions des prises de contact</a>
    </div>
    <div>
        <a href="/car-location/" class="btn btn-outline-success w-50 my-3">Retour à la page d'accueil</a>
    </div>
</section>
<?php
require_once '../templates/includes/footer.php';
?>