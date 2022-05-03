<?php
session_start();

include_once('./config/mysql.php');

//Variable to get the post id from the hidden input
$postData = $_POST;?>

<?php 
//If there is not post id, we display an error message
if (!isset($postData['id'])): ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="./style/form_stylesheet.css">
	<title>Le Labo Collectif - Suppression de publication</title>
</head>
<body>
    <div id="bloc_page">
        <?php include_once("header.php");?>
            <div id="contact-error">
                <p>Il faut un identifiant valide pour supprimer une publication...</p>
                <a class="return_link" href="forum.php">Retour dans l'Espace Collectif</a>
            </div>
        <?php include_once("footer.php");?>    
    </div>
</body>
</html>

<?php else:?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="./style/form_stylesheet.css">
	<title>Le Labo Collectif - Suppression de publication</title>
</head>
<body>
    <div id="bloc_page">
    <?php include_once("header.php");?>
        <div id="contact-confirmation">
            <h1>Publication Supprimée !</h1>
            <p><a class="return_link" href="forum.php">Retour dans l'espace collectif</a></p>
        </div>  
    <?php include_once("footer.php");?>   
    </div>
</body>
</html>   

<?php endif; ?>

<?php
//We delete the post
$id = $postData['id'];

$deletePostStatement = $mysqlClient->prepare('DELETE FROM posts WHERE post_id = :id');
$deletePostStatement->execute([
    'id' => $id,
]);
?>