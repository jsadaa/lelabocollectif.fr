<?php 
$titre = 'Le Labo Collectif - Espace Collaboratif';
$css = "public/css/form.css";?>

<?php ob_start(); ?>
    <div id="contact-confirmation">
        <h1>Publication modifiée !</h1>
        <h5>Détail de votre publication</h5>
        <p><b>Titre</b> : <?= strip_tags($_POST['title']); ?></p>
        <p><b>Auteur</b> : <?= strip_tags($_SESSION['LOGGED_USER_NAME']); ?></p>
        <p><b>Publication</b> : <?= strip_tags($_POST['post']); ?></p>
        <p><a class="return_link" href="index.php?action=displayForum">Retour dans l'espace collectif</a></p>
    </div>
<?php $content = ob_get_clean(); ?>

<?php require 'templates/layout.php'; ?>