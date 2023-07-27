<?php
include_once '../templates/includes/front/header.php';
?>
<section class="container py-3">
    <h1>Connectez-vous</h1>
    <form action="/car-location/connect" method="post" class="w-75 m-auto">
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>
        <div class="mb-3">
            <label for="pswd" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" id="pswd" name="pswd">
        </div>

        <button type="submit" class="btn btn-outline-success">Envoyer</button>
    </form>
</section>
<?php
include_once '../templates/includes/footer.php';
