<?php session_start();?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="./style/form_stylesheet.css">
	<title>Le Labo Collectif - Créer un compte</title>
</head>
<body>

<div id="bloc_page">

<?php 
include_once("./config/mysql.php");
include_once("functions.php");
include_once("header.php");

//Variables to get the new user account form data
$full_name = $_POST['full_name'];
$email = $_POST['email'];
$age = $_POST['age'];
$password = $_POST['password'];
?>

<!-- If the form is not correctly filled or empty, we display an error message-->

<?php if (!isset($_POST['full_name']) || !isset($_POST['email']) || !isset($_POST['age']) || !isset($_POST['password'])): ?>

    <div id="contact-error">
        <p>Il manque des informations pour la création de votre compte</p>
        <a href="create_user.php">Retour au formulaire</a>
    </div>

  <!-- If the email is not valid, we display an error message-->  

<?php elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)): ?>

    <div id="contact-error">
        <p>Il faut un email valide pour créer un compte</p>
        <a href="create_user.php">Retour au formulaire</a>
    </div> 

<?php else: ?>

 <!--We display the new user account details-->   

<div id="contact-confirmation">
    <h1>Compte Créé !</h1>
    <h5>Détail de votre Compte</h5>
    <p><b>Nom</b> : <?php echo strip_tags($full_name); ?></p>
    <p><b>Email</b> : <?php echo strip_tags($email); ?></p>
    <p><b>Age</b> : <?php echo strip_tags($age); ?></p>
    <p><b>MDP</b> : <?php echo strip_tags($password); ?></p>
    <p><a class="return_link" href="forum.php">Se connecter</a></p>

</div>

<!--We insert the new user in the database-->

<?php 
$insertUser = $mysqlClient->prepare('INSERT INTO users(full_name, email, user_password, age) VALUES (:full_name, :email, :user_password, :age)');
$insertUser->execute([
    'full_name' => $full_name,
    'email' => $email,
    'user_password' => $password,
    'age' => $age,
]);
?>

<?php endif; ?>

<?php include_once("footer.php");?>

</div>

</body>
</html>