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

