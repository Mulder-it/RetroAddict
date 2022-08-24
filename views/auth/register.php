<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<form action="/RetroAddict/register" method="post">
    <fieldset>
        <legend>Créer un compte</legend>
        <div class=registerform>
            <table>
                <tr>
                    <td><label>Votre nom:</td><td><input type="text" name="username" size="64" maxlength="255" value=""> </label></td>
                </tr>
                <tr>
                    <td><label>Votre prénom:</td><td><input type="text" name="firstname" size="64" maxlength="255" value=""> </label></td>
                </tr>
                <tr>
                    <td><label>Adresse e-mail:</td><td><input type="text" name="email" size="64" maxlength="255" value=""> </label></td>
                </tr>
                <tr>
                    <td><label>Mot de passe:<br>(au moins 4 caractères)</td><td><input type="password" name="password" size="64" maxlength="255" value=""> </label></td>
                </tr>
                <tr>
                    <td></td><td><input type="submit" value="Créer votre compte" class="btn btn-primary"> </td>
                </tr>
            </table>
        </div>
    </fieldset>
</form>
