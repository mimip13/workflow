<h2>Se connecter</h2>
<form method="post" action="<?= URL ?>loginValidation">
    <label for="email">Email</label>
    <input class="form-control" type="email" name="email" id="email" required>
    <label for="password">Mot de passe</label>
    <input class="form-control" type="password" name="password" id="password">
    <button type="submit" class="btn btn-success">Se connecter</button>
</form>
