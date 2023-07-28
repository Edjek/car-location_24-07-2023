<?php
require_once '../templates/includes/admin/header.php';
?>
<section class="container py-3">
    <table class="table table-striped caption-top">
        <!-- la boucle foreach du tableau $cars -->
        <caption>Liste de nos véhicules</caption>
        <thead>
            <tr>
                <th>Id</th>
                <th>Modèle</th>
                <th>Description</th>
                <th>Prix</th>
                <th>Nom du fichier</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Id</th>
                <th>Modèle</th>
                <th>Description</th>
                <th>Prix</th>
                <th>Nom du fichier</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
        </tfoot>

        <tbody>
            <?php
            foreach ($cars as $car) {
            ?>
                <tr>
                    <td><?= $car['id']; ?></td>
                    <td><?= $car['name']; ?></td>
                    <td><?= $car['description']; ?></td>
                    <td><?= $car['price']; ?> euros</td>
                    <td>
                        <img src="/car-location/public/img/upload/<?= $car['image']; ?>" alt="" class="img-thumb">
                    </td>
                    <td class="text-center">
                        <!-- Creer la route en question -->
                        <!-- le controlleur AdminCarController -->
                        <!-- carForm() -->
                        <!-- Affiche templates/admin/car-form.php -->
                        <!--  -->
                        <a href="/car-location/backoffice/update-car/<?= $car['id']; ?>">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                    </td>
                    <td class="text-center">
                        <a href="">
                            <i class="bi bi-trash3 text-danger"></i>
                        </a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
        <!--  -->
    </table>
</section>
<?php
require_once '../templates/includes/footer.php';
