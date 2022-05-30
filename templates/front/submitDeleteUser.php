<?php 
$titre = 'Le Labo Collectif - Espace Collaboratif';
$css = "public/css/form.css";?>

<?php ob_start(); ?>
    <div id="contact-confirmation">
        <h1>Votre compte a bien été supprimé !</h1>
        <p><a class="return_link" href="index.php">Retour à l'accueil</a></p>
    </div>  
<?php $content = ob_get_clean(); ?>

<?php require 'templates/layout.php'; ?>
