<?php
require_once '../templates/includes/admin/header.php';
?>
<section>
    <table class="table">
        <!-- la boucle foreach du tableau $cars -->
        <?php
        foreach ($cars as $car) {
        ?>
            <tr>
                <td><?= $car['id']; ?></td>
                <td><?= $car['name']; ?></td>
                <td><?= $car['description']; ?></td>
                <td><?= $car['price']; ?> euros</td>
                <td><?= $car['image']; ?></td>
            </tr>
        <?php
        }
        ?>
        <!--  -->
    </table>
</section>
<?php
require_once '../templates/includes/footer.php';
