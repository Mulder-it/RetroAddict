<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<h1><?= $params['user']->username ?? 'Profil' ?></h1>
<form action="<?= isset($params['user']) ? "/RetroAddict/users/editUser/{$params['user']->id}" : "/RetroAddict/register" ?>" method="POST">
    <div class="form-group">
        <label for="title">Nom</label>
        <input type="text" class="form-control" name="username" id="username" value="<?= $params['user']->username ?? '' ?>">
    </div>
    <div class="form-group">
        <label for="title">Prénom</label>
        <input type="text" class="form-control" name="firstname" id="firstname" value="<?= $params['user']->firstname ?? '' ?>">
    </div>
    <div class="form-group">
        <label for="title">email</label>
        <input type="text" class="form-control" name="email" id="email" value="<?= $params['user']->email ?? '' ?>">
    </div>
    <div class="form-group">
        <label for="title">mot de passe</label>
        <input type="text" class="form-control" name="password" id="password" value="<?= $params['user']->password ?? '' ?>">
    </div>


    <button type="submit" class="btn btn-primary"><?= isset($params['user']) ?'Enregistrer les modifications' : 'Enregistrer les modification' ?></button>
</form>