<?php session_start();

include_once("./config/mysql.php");
include_once("functions.php");
include_once("header.php");

//Variable to get the post id
$postData = $_POST;

//Variable the set the post mods
$id = $postData['id'];
$title = $postData['title'];
$post = $postData['post'];

//We update the post
$insertPostUpdate = $mysqlClient->prepare('UPDATE posts SET title = :title, post = :post WHERE post_id = :id');
$insertPostUpdate->execute([
    'title' => $title,
    'post' => $post,
    'id' => $id,
]);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="./style/form_stylesheet.css">
	<title>Le Labo Collectif - Modifier une publication</title>
</head>
<body>

<div id="bloc_page">

<!--If there is no post id and data, we display an error message-->

<?php if (
    !isset($postData['id'])
    || !isset($postData['title']) 
    || !isset($postData['post'])
    ): ?>

    <div id="contact-error">
        <p>Il manque des informations pour mettre à jour la publication</p>
        <a href="forum.php">Retour dans l'Espace Collectif</a>
    </div>

<?php else: ?>

<!--We display post mods details-->    

<div id="contact-confirmation">
    <h1>Publication modifiée !</h1>
    <h5>Détail de votre publication</h5>
    <p><b>Titre</b> : <?php echo strip_tags($title); ?></p>
    <p><b>Auteur</b> : <?php echo strip_tags($_SESSION['LOGGED_USER_NAME']); ?></p>
    <p><b>Publication</b> : <?php echo strip_tags($post); ?></p>
    <p><a class="return_link" href="forum.php">Retour dans l'espace collectif</a></p>
</div>

<?php endif; ?>

<?php include_once("footer.php");?>

</div>

</body>
</html>