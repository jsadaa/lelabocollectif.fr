<?php session_start();

include_once('./config/mysql.php');

//variable to get the post id
$getData = $_GET;

//We get the right post data in the database
$retrievePostStatement = $mysqlClient->prepare('SELECT * FROM posts WHERE post_id = :id');
$retrievePostStatement->execute([
    'id' => $getData['id'],
]);

//We display the post data in the update form
$post = $retrievePostStatement->fetch(PDO::FETCH_ASSOC);?>

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

    <?php include_once('header.php');?>

    <!--If there is no post id or if the post id is not a number, we display a message error-->

    <?php if (!isset($getData['id']) && is_numeric($getData['id'])): ?>

      <div id="contact-error">
          <p>Il faut un identifiant de publication pour le modifier...</p>
          <a href="forum.php">Retour dans l'espace Collaboratif</a>
      </div>
      
    <?php else: ?>  

     <!--Post update form--> 
        
    <form id="post-form" action="submit_post_update.php" method="post">

      <h2>Modifier "<?php echo($post['title']); ?>"</h2>

      <div class="form-group"> 
        <label for="id" id="id-label"></label>
        <input type="hidden" class="form-control" id="id" name="id" value="<?php echo($getData['id']); ?>">
      </div>

      <div class="form-group"> 
        <label for="title" id="title-label">Titre</label>
        <input type="text" id="title" class="form-control" name="title" value="<?php echo($post['title']); ?>">
      </div>
                      
      <div class="form-group">
        <p>Message</p>
        <textarea id="post" class="form-control" name="post">
        <?php echo strip_tags($post['post']); ?>
        </textarea>
      </div>
            
      <div class="form-group">
        <button type="submit" id="submit" class="submit-button">
        Modifier
        </button>
      </div>
    </form>

    <?php endif; ?>

    <?php include_once('footer.php'); ?>
  </div>
</body>
</html>