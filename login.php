<?php
include_once('./config/mysql.php');

//We get all the users from the database
$getUsers = $mysqlClient->prepare('SELECT * FROM users');
$getUsers->execute();
$users = $getUsers->fetchAll();

// Connexion form validation
if (isset($_POST['email']) &&  isset($_POST['password'])) {
    foreach ($users as $user) {
        if (
            $user['email'] === $_POST['email'] &&
            $user['user_password'] === $_POST['password']
        ) {
            $_SESSION['LOGGED_USER'] = $user['email'];
            $_SESSION['LOGGED_USER_NAME'] = $user['full_name'];
            $_SESSION['LOGGED_USER_ACCOUNT_TYPE'] = $user['is_admin'];
        } else {
            $errorMessage = 'L\'identifiant et/ou le mot de passe sont incorrects...';
        }
    }
}
?>

<?php 
//If the user is not logged in, we display connexion form
if(!isset($_SESSION['LOGGED_USER'])): ?>

<!--Connexion form-->

<form action="" method="post">

    <?php if(isset($errorMessage)) : //Error display ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $errorMessage; ?>
        </div>
    <?php endif; ?>

    <h2>Connexion</h2>

    <div class="form-group">   
        <label for="email" id="email-label">Email</label>
        <input type="email" id="email" class="form-control" name="email" placeholder="Entrez votre Email">
    </div>

    <div class="form-group"> 
        <label for="password" id="password-label">Mot de passe</label>
        <input type="password" id="password" class="form-control" name="password" placeholder="">
    </div>

    <div class="form-group">
        <button type="submit" id="submit" class="submit-button">
        Se connecter
        </button>
    </div>

    <div class="form-group">
        <a id="new-user" href="create_user.php">Créer un nouveau compte</a>
    </div>
</form>

<?php else: //If the user is logged in, we display a welcome message in the forum?>
    <div class="login-success" role="alert">
        Bonjour <?php echo $_SESSION['LOGGED_USER_NAME']; ?> (<?php echo $_SESSION['LOGGED_USER']?>) et bienvenue dans l'espace collaboratif !
    </div>
<?php endif; ?>