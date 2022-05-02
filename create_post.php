<?php session_start();?>

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

    <!-- Post creation form-->
        
    <form id="post-form" action="submit_post.php" method="post">

      <h2>Créer une publication</h2>

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

    <?php include_once('footer.php'); ?>
  </div>
</body>
</html>