<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<h1>Panel d'Administration</h1>

<?php if(isset($_GET['success'])): ?>
    <div class="alert alert-success">Vous êtes connecté!</div>
<?php endif ?>

<h1>Articles</h1><a href="/RetroAddict/admin/posts/create" class="btn btn-success my-3">Créer un nouvel article</a>

<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Titre</th>
        <th scope="col">Publié le</th>
        <th scope="col">Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($params['posts'] as $post) : ?>
        <tr>
            <th scope="row"><?= $post->id ?></th>
            <td><?= $post->title ?></td>
            <td><?= $post->getCreatedAt() ?></td>
            <td>
                <a href="/RetroAddict/admin/posts/edit/<?= $post->id ?>" class="btn btn-warning" methods="POST">Modifier</a>
                <form action="/RetroAddict/admin/posts/delete/<?= $post->id ?>" method="POST" class="d-inline">
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </td>
        </tr>
    <?php endforeach ?>
    </tbody>
</table>
