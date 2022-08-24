<!-- Tableau d'erreurs Si pas de données entrées -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">


<?php if (isset($_SESSION['errors'])): ?>

    <?php foreach($_SESSION['errors'] as $errorsArray): ?>
        <?php foreach($errorsArray as $errors): ?>
            <div class="alert alert-danger">
                <?php foreach($errors as $error): ?>
                    <li><?= $error ?></li>
                <?php endforeach ?>
            </div>
        <?php endforeach ?>
    <?php endforeach ?>

<?php endif ?>

<div class="containerlog">
    <div class="row">
    <div class="col-md-6"></div>
        <h2>Se connecter</h2>
        <form action="/RetroAddict/login" method="POST">
            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" class="form-control" required id="email">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required id="password">
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
        <div><form action="/RetroAddict/register">
                <button type="submit" class="btn btn-secondary">S'enregistrer</button>
            </form></div>
    </div>
<!--
</div>
<form action="/RetroAddict/login" method="POST">
    <div>
        <label for="email">Login</label>
        <input type="text"  name="email" id="email">
    </div>
    <div>
        <label for="password">Password</label>
        <input type="password" class="form-control" name="password" id="password">
    </div>
    <button type="submit">Se connecter</button>
</form>
<form action="/RetroAddict/register">
    <button type="submit">S'enregistrer</button>
</form>
-->