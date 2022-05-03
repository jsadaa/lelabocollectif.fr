<?php session_start();?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="./style/form_stylesheet.css">
	<title>Le Labo Collectif - Publication</title>
</head>
<body>

<div id="bloc_page">

<?php 
include_once("./config/mysql.php");
include_once("functions.php");
include_once("header.php");

//Variable to get the post creation data
$title = $_POST['title'];
$post = $_POST['post'];
?>

<?php 
//If the form is not correctly filled or empty, we display an error message
if (!isset($_POST['title']) || empty($_POST['post'])): ?>

    <div id="contact-error">
        <p>Il faut un titre et une publication pour soumettre le formulaire...</p>
        <a href="create_post.php">Retour au formulaire</a>
    </div>

<?php else:  //We display the new post details ?>

<div id="contact-confirmation">
    <h1>Publication envoyée !</h1>
    <h5>Détail de votre publication</h5>
    <p><b>Titre</b> : <?php echo strip_tags($title); ?></p>
    <p><b>Auteur</b> : <?php echo strip_tags($_SESSION['LOGGED_USER_NAME']); ?></p>
    <p><b>Publication</b> : <?php echo strip_tags($post); ?></p>
    <p><a class="return_link" href="forum.php">Retour dans l'espace collectif</a></p>
</div>

<?php 
//We insert the new post in the database
$insertPost = $mysqlClient->prepare('INSERT INTO posts(title, post, author, is_enabled) VALUES (:title, :post, :author, :is_enabled)');
$insertPost->execute([
    'title' => $title,
    'post' => $post,
    'author' => $_SESSION['LOGGED_USER_NAME'],
    'is_enabled' => 1,   
]);
?>

<?php endif; ?>

<?php include_once("footer.php");?>

</div>
</body>
</html>