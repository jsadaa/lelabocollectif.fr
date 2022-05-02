<?php
session_start();
session_destroy() ;

include_once('./config/mysql.php');

//Variable to get the user id
$getData = $_GET;?>


<!-- If there is not user id, we display an error message-->
<?php if (!isset($getData['id'])): ?>

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
            <div id="contact-error">
                <p>Il faut un identifiant valide pour supprimer un compte...</p>
                <a class="return_link" href="forum.php">Retour dans l'Espace Collectif</a>
            </div>
        <?php include_once("footer.php");?>    
    </div>
</body>
</html>

<?php endif; ?>

<!--We delete the user account and posts and redirect to the home page-->

<?php
$id = $getData['id'];

$deleteUserStatement = $mysqlClient->prepare('DELETE FROM users WHERE full_name = :id');
$deleteUserStatement->execute([
    'id' => $id,
]);

$deletePostStatement = $mysqlClient->prepare('DELETE FROM posts WHERE author = :id');
$deletePostStatement->execute([
    'id' => $id,
])
;

header('Location: index.php');
?>