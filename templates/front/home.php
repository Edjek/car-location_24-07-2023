<?php
require_once '../templates/includes/header.php'
?>
<section>
    <div>
        <?php
        foreach ($cars as $car) {
        ?>
            <h1><?= $car['name']; ?></h1>
            <p><?= $car['description']; ?></p>
            <img src="/car-location/public/img/<?= $car['image']; ?>" alt="Une image de ">
            <a href="/car-location/reservation/<?= $car['id']; ?>">reserver</a>
        <?php
        }
        ?>
    </div>
</section>
<?php
require_once '../templates/includes/footer.php'
?>