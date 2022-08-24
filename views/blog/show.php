<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<!-- Affichage des articles -->
<h1><?= $params['post']->title ?></h1>
<div>
    <?php foreach ($params['post']->getTags() as $tag) : ?>
        <span class="badge badge-info"><?= $tag->name ?></span>
    <?php endforeach ?>
</div>
<!-- Content appelé dans le layout.php -->
<p><?= $params['post']->content ?></p>
<a href="/RetroAddict/posts" class="btn btn-secondary">Retourner en arrière</a>

