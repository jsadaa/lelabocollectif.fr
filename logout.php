<?php 
session_start() ;
session_destroy() ; ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="./style/forum_stylesheet.css">
	<title>Le Labo Collectif - Déconnexion</title>
</head>
<body>
    <div id="bloc_page">
        <?php include_once('header.php')?>
            <div id="logout-confirmation">
                <h1>Vous avez bien été déconnecté !</h1>
                <h2>A bientôt !</h2>
                <a href="index.php" class="return_link">Retour à l'accueil</a>
            </div>
        <?php include_once('footer.php')?>
    </div>
</body>
</html>