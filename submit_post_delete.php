<?php
session_start();

include_once('./config/mysql.php');

//Variable to get the post id from the hidden input
$postData = $_POST;?>

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

<?php 
$old_timestamp = time() - (15*60);

if(isset($_SESSION['delete_token']) && isset($_SESSION['delete_token_time']) && isset($postData['delete_token']) && (isset($postData['id'])) && ($_SESSION['delete_token'] == $_POST['delete_token']) && ($_SESSION['delete_token_time'] >= $old_timestamp)): ?>

        <div id="contact-confirmation">
            <h1>Publication Supprimée !</h1>
            <p><a class="return_link" href="forum.php">Retour dans l'espace collectif</a></p>
        </div>  

<?php
//We delete the post
$id = $postData['id'];

$deletePostStatement = $mysqlClient->prepare('DELETE FROM posts WHERE post_id = :id');
$deletePostStatement->execute([
    'id' => $id,
]);
?>

<?php else: //If there is not post id or the user is not authentificated, we display an error message ?>

            <div id="contact-error">
                <p>Il faut un identifiant valide et les droits nécéssaires pour supprimer une publication...</p>
                <a class="return_link" href="forum.php">Retour dans l'Espace Collectif</a>
            </div>

<?php endif; ?>            

        <?php include_once("footer.php");?>    
    </div>
</body>
</html>

