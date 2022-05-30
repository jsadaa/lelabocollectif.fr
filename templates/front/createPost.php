<?php 
$titre = 'Le Labo Collectif - Espace Collaboratif';
$css = "public/css/forum.css";?>

<?php ob_start(); ?>
    <form id="post-form" action="index.php?action=submitPost" method="post">

        <h2>Créer une publication</h2>

        <div class="form-group">
            <label for="create_token" class="form-label"></label>
            <input type="hidden" name="create_token" id="create_token" value="<?= $_SESSION['create_token'];?>">
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
<?php $content = ob_get_clean(); ?>

<?php require 'templates/layout.php'; ?>