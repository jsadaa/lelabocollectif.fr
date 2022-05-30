<?php 
$titre = 'Le Labo Collectif - Déconnection';
$css = "public/css/forum.css";?>

<?php ob_start(); ?>
    <div id="logout-confirmation">
        <h1>Vous avez bien été déconnecté !</h1>
        <h2>A bientôt !</h2>
        <a href="index.php" class="return_link">Retour à l'accueil</a>
    </div>
<?php $content = ob_get_clean(); ?>


<?php require 'templates/layout.php'; ?>

