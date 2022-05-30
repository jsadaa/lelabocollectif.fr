<?php 
$titre = 'Le Labo Collectif - Contact';
$css = "public/css/form.css";?>

<?php ob_start(); ?>
    <div id="contact-confirmation">
        <h1>Message bien envoyé !</h1>
        <h5>Rappel de vos informations</h5>
        <p><b>Nom</b> : <?= strip_tags($name); ?></p>
        <p><b>Email</b> : <?= $mail; ?></p>
        <p><b>Sujet</b> : <?= strip_tags($subject); ?></p>
        <p><b>Message</b><span id="message_detail"> : <?= strip_tags($message); ?></span></p>
        <p><b>Fichier</b> : <?= ($attachmentState); ?></p>
        <p><a class="return_link" href="index.php">Retour à l'accueil</a></p>
    </div>
<?php $content = ob_get_clean(); ?>

<?php require 'templates/layout.php'; ?>