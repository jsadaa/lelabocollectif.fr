<?php $titre = 'Le Labo Collectif - Connection'; ?>
<?php $css = "./public/css/forum.css";?>

<?php ob_start() ?>
    <form action="index.php?action=displayForum" method="post">

        <h2>Connexion</h2>

        <div class="form-group">   
            <label for="email" id="email-label">Email</label>
            <input type="email" id="email" class="form-control" name="email" placeholder="Entrez votre Email">
        </div>

        <div class="form-group"> 
            <label for="password" id="password-label">Mot de passe</label>
            <input type="password" id="password" class="form-control" name="password" placeholder="">
        </div>

        <div id="displayPassword" class="form-group"> 
            <label for="checkbox" id="checkbox-label">Afficher le mot de passe</label>
            <input type="checkbox" id="checkbox" class="form-control" name="checkbox" placeholder="">
        </div>

        <div class="form-group">
            <button type="submit" id="submit" class="submit-button">
                Se connecter
            </button>
        </div>

        <div class="form-group">
            <a id="new-user" href="index.php?action=displayCreateUser">Créer un nouveau compte</a>
        </div>

    </form>

    <script src="public/js/script.js"></script>
<?php $content = ob_get_clean(); ?>

<?php require 'templates/layout.php'; ?>