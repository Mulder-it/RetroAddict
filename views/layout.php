<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <title>Retro Addict</title>
        <link rel="stylesheet" href="<?= SCRIPTS . 'css' . DIRECTORY_SEPARATOR . 'style.css' ?>">
    </head>

    <body>
        <header><img src="/RetroAddict/images/header2mini.png" alt="logo"></header>
        <nav>
            <ul>
                <li><a href="/RetroAddict/">Accueil</a></li>
                <li><a href="/RetroAddict/posts/">Articles</a></li>
                <?php if (isset($_SESSION['auth']) && $_SESSION['auth'] ===1 ){?>
                    <li><a href="/RetroAddict/admin/posts/">Gestion articles</a></li>
                    <li><a href="/RetroAddict/users">Gestion utilisateurs</a></li>
                    <li><a href="/RetroAddict/logout/">Se déconnecter</a></li>
                <?php }elseif( isset($_SESSION['auth']) && $_SESSION['auth'] != 1){ ?><li>
                    <li><a href="/RetroAddict/admin/posts/">Gestion articles</a></li>
                    <li><a href="/RetroAddict/users/profil/<?= $_SESSION['id'] ?>">Profil</a></li>
                    <li><a href="/RetroAddict/logout/">Se déconnecter</a></li>
                <?php } else { ?>
                    <li><a href="/RetroAddict/login/">login</a></li>
                <?php } ?>



        </nav>
    <div class="container">
        <?= $content ?>
    </div>
    </body>
</html>
