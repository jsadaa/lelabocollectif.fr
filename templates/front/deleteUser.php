<?php 
$titre = 'Le Labo Collectif - Espace Collaboratif';
$css = "public/css/form.css";?>

<?php ob_start(); ?>
    <form id="post-form" action="index.php?action=submitDeleteUser&id=<?= $_SESSION['LOGGED_USER_NAME'];?>" method="POST">

        <h2>Supprimer votre compte ?</h2>
        <h3>Cela supprimera également vos publications</h3>
        
        <div class="form-group">
            <label for="id" class="form-label"></label>
            <input type="hidden" class="form-control" id="id" name="id" value="<?= $_GET['id'];?>">
        </div>

        <div class="form-group">
            <label for="delete_user_token" class="form-label"></label>
            <input type="hidden" class="form-control" id="delete_user_token" name="delete_user_token" value="<?= $_SESSION['delete_user_token'];?>">
        </div>
        
        <div class="form-group">
            <button type="submit" id="submit" class="submit-button">
            Supprimer
            </button>
        </div>

        <div class="form-group">
            <p><a class="return_link" href="index.php?action=displayForum">Annuler</a></p>
        </div>
                
    </form>
<?php $content = ob_get_clean(); ?>

<?php require 'templates/layout.php'; ?>