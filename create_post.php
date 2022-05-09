<?php session_start();

$create_token = uniqid(rand(), true);

$_SESSION['create_token'] = $create_token;
$_SESSION['create_token_time'] = time();

$getData = $_GET;
?>


<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="./style/form_stylesheet.css">
	<title>Le Labo Collectif - Créer une publication</title>
</head>

<body>
  
  <div id="bloc_page">

    <?php include_once('header.php');?>

    <?php 
    $old_timestamp = time() - (15*60);
    if ((isset($_SESSION['user_token']) && isset($_SESSION['user_token_time']) && isset($getData['id']) && ($_SESSION['user_token_time'] >= $old_timestamp))):  ?>

    <!-- Post creation form-->
        
    <form id="post-form" action="submit_post.php" method="post">

      <h2>Créer une publication</h2>

      <div class="form-group">
        <label for="create_token" class="form-label"></label>
        <input type="hidden" name="create_token" id="create_token" value="<?php echo $create_token;?>">
      </div>

      <div class="form-group">
        <label for="pass_user_token" class="form-label"></label>
        <input type="hidden" name="pass_user_token" id="pass_user_token" value="<?php echo $getData['id'];?>">
      </div>

      <div class="form-group"> 
        <label for="title" id="title-label">Titre</label>
        <input type="text" id="title" class="form-control" name="title" placeholder="Titre">
      </div>
                      
      <div class="form-group">
        <p>Message</p>
        <textarea id="post" class="form-control" name="post" placeholder="Ecrivez quelque chose..."></textarea>
      </div>
            
      <div class="form-group">
        <button type="submit" id="submit" class="submit-button">
        Envoyer
        </button>
      </div>
      
    </form>

    <?php else: ?>

    <div id="contact-error">
        <p>Vous n'avez pas les droits nécéssaires pour créer une publication</p>
        <a href="create_post.php">Retour au formulaire</a>
    </div>

    <?php endif;?>

    <?php include_once('footer.php'); ?>
  </div>
</body>
</html>