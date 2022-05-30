<?php 
$titre = 'Le Labo Collectif - Espace Collaboratif';
$css = "public/css/forum.css";?>

<?php ob_start(); ?>
    <form id="post-form" action="index.php?action=submitUser" method="post">

        <h2>Créer un compte</h2>
                
        <div class="form-group"> 
            <label for="full_name" id="full_name-label">Nom</label>
            <input type="text" id="full_name" class="form-control" name="full_name" placeholder="Prénom/Nom">
        </div>

        <div class="form-group"> 
            <label for="email" id="email-label">Email</label>
            <input type="email" id="email" class="form-control" name="email" placeholder="Email">
        </div>

        <div class="form-group"> 
            <label for="age" id="age-label">Age</label>
            <input type="text" id="age" class="form-control" name="age" placeholder="Age">
        </div>
                        
        <div class="form-group"> 
            <label for="password" id="password-label">Mot de passe</label>
            <input type="password" id="password" class="form-control" name="password">
        </div>

        <div id="displayPassword" class="form-group"> 
            <label for="checkbox" id="checkbox-label">Afficher le mot de passe</label>
            <input type="checkbox" id="checkbox" class="form-control" name="checkbox" placeholder="">
        </div>
                
        <div class="form-group">
            <button type="submit" id="submit" class="submit-button">
                Envoyer
            </button>
        </div>

    </form>

    <script src="public/js/script.js"></script>
<?php $content = ob_get_clean(); ?>

<?php require 'templates/layout.php'; ?>