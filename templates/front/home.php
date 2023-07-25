<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div>
        <?php
        foreach ($cars as $car) {
        ?>
            <h1><?= $car['name']; ?></h1>
            <p><?= $car['description']; ?></p>
            <img src="/car-location/public/img/<?= $car['image']; ?>" alt="">
            <a href="/car-location/contact/form/<?= $car['id']; ?>">reserver</a>
        <?php
        }
        ?>
    </div>
</body>

</html>