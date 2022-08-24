<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<h1>Panel d'Administration</h1>

<?php if(isset($_GET['success'])): ?>
    <div class="alert alert-success">Vous êtes connecté!</div>
<?php endif ?>

<h1>Utilisateurs</h1>

<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Nom</th>
        <th scope="col">Prénom</th>
        <th scope="col">email</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($params['users'] as $user) : ?>
        <tr>
            <th scope="row"><?= $user->id ?></th>
            <td><?= $user->username ?></td>
            <td><?= $user->firstname?></td>
            <td><?= $user->email ?></td>
            <td><?= $user->password ?></td>
            <td>
                <a href="/RetroAddict/users/editUser/<?= $user->id ?>" class="btn btn-warning">Modifier</a>
                <form action="/RetroAddict/users/deleteUser/<?= $user->id ?>" method="POST" class="d-inline">
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Etes-vous sûr?')">Supprimer</button>
                </form>
            </td>
        </tr>
    <?php endforeach ?>
    </tbody>
</table>