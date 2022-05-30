<?php 
$titre = 'Le Labo Collectif - Espace Collaboratif';
$css = "public/css/forum.css";?>

<?php ob_start(); ?>
    <form id="post-form" action="index.php?action=submitDeletePost" method="POST">

        <h2>Supprimer la publication ?</h2>
        
        <div class="form-group">
            <label for="id" class="form-label"></label>
            <input type="hidden" class="form-control" id="id" name="id" value="<?= $_GET['id'];?>">
        </div>

        <div class="form-group">
            <label for="id" class="form-label"></label>
            <input type="hidden" name="delete_token" id="delete_token" value="<?= $_SESSION['delete_token'];?>">
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