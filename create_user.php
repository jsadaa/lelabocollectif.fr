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

    <?php include_once('header.php');?>

    <!--User account creation form-->
        
    <form id="post-form" action="submit_user.php" method="post">

      <h2>Créer un compte</h2>
            
      <div class="form-group"> 
        <label for="full_name" id="full_name-label">Nom</label>
        <input type="text" id="full_name" class="form-control" name="full_name" placeholder="Prénom/Nom">
      </div>

      <div class="form-group"> 
        <label for="email" id="email-label">Email</label>
        <input type="email" id="email" class="form-control" name="email" placeholder="Email">
      </div>

      <div class="form-group"> 
        <label for="age" id="age-label">Age</label>
        <input type="text" id="age" class="form-control" name="age" placeholder="Age">
      </div>
                     
      <div class="form-group"> 
        <label for="password" id="password-label">Mot de passe</label>
        <input type="password" id="password" class="form-control" name="password">
      </div>
            
      <div class="form-group">
        <button type="submit" id="submit" class="submit-button">
        Créer
        </button>
      </div>
    </form>

    <?php include_once('footer.php'); ?>
  </div>
</body>
</html>