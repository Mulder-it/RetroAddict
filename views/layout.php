<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Retro Addict</title>
    <link rel="stylesheet" href="<?= SCRIPTS . 'css' . DIRECTORY_SEPARATOR . 'app.css' ?>">
</head>

<body>
<div class="bg"></div>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/RetroAddict/">Accueil</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="/RetroAddict/posts/">News</a>
            </li>
            <?php if (isset($_SESSION['auth'])){?>
            <li class="nav-item">
                <a class="nav-link" href="/RetroAddict/admin/posts/">Administration</a>
           <?php }else{ ?><li class="nav-item">
                <a class="nav-link" href="/RetroAddict/login/">login</a>
            </li>
            <?php } ?>
        </ul>
        <ul class="navbar-nav ml-auto">
            <?php if (isset($_SESSION['auth'])): ?>
                <li class="nav-item">
                    <a class="nav-link" href="/RetroAddict/logout/">Se déconnecter</a>
                </li>
            <?php endif ?>
        </ul>
    </div>
</nav>

<div class="bg-image" style="background-image: url('../images/Background1.jpg')"></div>
<div class="container">
    <?= $content ?>
</div>


</body>

</html>
