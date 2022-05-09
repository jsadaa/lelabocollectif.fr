<?php
session_start();
session_destroy() ;

include_once('./config/mysql.php');

//Variable to get the user id
$getData = $_GET;?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="./style/form_stylesheet.css">
	<title>Le Labo Collectif - Suppression de compte</title>
</head>
<body>
    <div id="bloc_page">
        <?php include_once("header.php");?>

<?php 
$old_timestamp = time() - (15*60);
if(isset($getData['id']) && isset($_SESSION['delete_user_token']) && isset($_SESSION['delete_user_token_time']) && isset($_POST['delete_user_token']) && ($_SESSION['delete_user_token'] == $_POST['delete_user_token']) && ($_SESSION['delete_user_token_time'] >= $old_timestamp)): ?>

        <div id="contact-confirmation">
            <h1>Votre compte a bien été supprimé !</h1>
            <p><a class="return_link" href="forum.php">Retour à l'accueil</a></p>
        </div>  

<?php
//We delete the user account 
$id = $getData['id'];

$deleteUserStatement = $mysqlClient->prepare('DELETE FROM users WHERE full_name = :id');
$deleteUserStatement->execute([
    'id' => $id,
]);
//We delete all user's posts
$deletePostStatement = $mysqlClient->prepare('DELETE FROM posts WHERE author = :id');
$deletePostStatement->execute([
    'id' => $id,
]);
?>

<?php else: ?>

        <div id="contact-error">
            <p>Il faut un identifiant valide et les droits nécéssaires pour supprimer un compte...</p>
            <a class="return_link" href="forum.php">Retour dans l'Espace Collectif</a>
        </div>

<?php endif; ?>

        <?php include_once("footer.php");?>    
    </div>
</body>
</html>


