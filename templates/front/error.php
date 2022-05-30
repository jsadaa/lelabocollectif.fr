<?php $titre = 'Le Labo Collectif - Erreur'; ?>
<?php $css = "./public/css/form.css";?>

<?php ob_start() ?>
    <div id="contact-error">
        <p>Une erreur est survenue : <?= $msgErreur ?></p>
        <a href="index.php">Retour à l'accueil</a>
    </div> 
<?php $content = ob_get_clean(); ?>

<?php require 'templates/layout.php'; ?>