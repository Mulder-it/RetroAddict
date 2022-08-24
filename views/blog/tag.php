<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<!-- Vue des post par tag -->
<h1><?= $params['tag']->name ?></h1>

<?php foreach ($params['tag']->getPosts() as $post) : ?>
    <div class="card mb-3">
        <div class="card-body">
            <a><a href="/RetroAddict/posts/<?= $post->id ?>"><?= $post->title ?></a></a>
        </div>
    </div>
<?php endforeach ?>

