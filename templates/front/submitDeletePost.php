<?php 
$titre = 'Le Labo Collectif - Espace Collaboratif';
$css = "public/css/form.css";?>

<?php ob_start(); ?>
    <div id="contact-confirmation">
        <h1>Publication Supprimée !</h1>
        <p><a class="return_link" href="index.php?action=displayForum">Retour dans l'espace collectif</a></p>
    </div>  
<?php $content = ob_get_clean(); ?>

<?php require 'templates/layout.php'; ?>