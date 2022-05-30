<?php 
$titre = 'Le Labo Collectif - Espace Collaboratif';
$css = "public/css/form.css";?>

<?php ob_start(); ?>
    <div id="contact-confirmation">
        <h1>Compte Créé !</h1>
        <h5>Détail de votre Compte</h5>
        <p><b>Nom</b> : <?= strip_tags($_POST['full_name']); ?></p>
        <p><b>Email</b> : <?= strip_tags($_POST['email']); ?></p>
        <p><b>Age</b> : <?= strip_tags($_POST['age']); ?></p>
        <p><a class="return_link" href="index.php?action=displayForum">Se connecter</a></p>
    </div>
<?php $content = ob_get_clean(); ?>

<?php require 'templates/layout.php'; ?>