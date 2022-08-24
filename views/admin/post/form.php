
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<h1><?= $params['post']->title ?? 'Editer Article' ?></h1>
<form action="<?= isset($params['post']) ? "/RetroAddict/admin/posts/edit/{$params['post']->id}" : "/RetroAddict/admin/posts/create" ?>" method="POST">
    <div class="form-group">
        <label for="title">Titre de l'article</label>
        <input type="text" class="form-control" name="title" id="title" value="<?= $params['post']->title ?? '' ?>">
    </div>
    <div class="form-group">
        <label for="content">Contenu de l'article</label>
        <textarea name="content" id="content" rows="8" class="form-control"><?= $params['post']->content ?? '' ?></textarea>
    </div>
    <div class="form-group">
        <label for="tags">Tags de l'article</label>
        <select required multiple class="form-control" id="tags" name="tags[]">
            <?php foreach ($params['tags'] as $tag) : ?>
                <option value="<?= $tag->id ?>"
                    <?php if (isset($params['post'])) : ?>
                        <?php foreach ($params['post']->getTags() as $postTag) {
                            echo ($tag->id === $postTag->id) ? 'selected' : '';
                        }
                        ?>
                    <?php endif ?>><?= $tag->name ?></option>
            <?php endforeach ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary"><?= isset($params['post']) ?'Enregistrer les modifications' : 'Enregistrer mon article' ?></button>
</form>
