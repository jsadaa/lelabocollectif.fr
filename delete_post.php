<?php session_start();

include_once('./config/mysql.php');

//Variable to get the post id
$getData = $_GET;

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Le Labo Collectif - Suppression de publication</title>
    <link href="./style/form_stylesheet.css" rel="stylesheet" type="text/css">
</head>
<body>

    <div id="bloc_page">

    <?php include_once('header.php'); ?>
        <form id="post-form" action="submit_post_delete.php" method="POST">

            <h2>Supprimer la publication ?</h2>
            
            <div class="form-group">
                <label for="id" class="form-label"></label>
                <input type="hidden" class="form-control" id="id" name="id" value="<?php echo($getData['id']); //We send the id via hidden input?>">
            </div>
            
            <div class="form-group">
                <button type="submit" id="submit" class="submit-button">
                Supprimer
                </button>
            </div>

            <div class="form-group">
                <p><a class="return_link" href="forum.php">Annuler</a></p>
            </div>

        </form>
    </div>

    <?php include_once('footer.php'); ?>
</body>
</html>