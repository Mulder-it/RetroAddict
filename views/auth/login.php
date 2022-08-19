<!-- Tableau d'erreurs Si pas de données entrées -->
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

<?php session_destroy(); ?>

<h1>Se connecter</h1>

<form action="/RetroAddict/login" method="POST">
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" name="username" id="username">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="password" id="password">
    </div>
    <button type="submit" class="btn btn-primary">Se connecter</button>
    <button type="submit" class="btn btn-primary">S'enregistrer</button>
</form>