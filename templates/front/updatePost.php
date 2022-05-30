<?php 
$titre = 'Le Labo Collectif - Espace Collaboratif';
$css = "public/css/forum.css";?>

<?php ob_start(); ?>
    <form id="post-form" action="index.php?action=submitUpdatePost" method="post">

        <h2>Modifier "<?php echo($post['title']); ?>"</h2>

        <div class="form-group"> 
            <label for="id" id="id-label"></label>
            <input type="hidden" class="form-control" id="id" name="id" value="<?= $_GET['id']; ?>">
        </div>

        <div class="form-group">
            <label for="update_token" class="form-label"></label>
            <input type="hidden" name="update_token" id="update_token" value="<?= $_SESSION['update_token']; ?>">
        </div>

        <div class="form-group"> 
            <label for="title" id="title-label">Titre</label>
            <input type="text" id="title" class="form-control" name="title" value="<?= $post['title']; ?>">
        </div>
                        
        <div class="form-group">
            <p>Message</p>
            <textarea id="post" class="form-control" name="post">
                <?= $post['post']; ?>
            </textarea>
        </div>
            
        <div class="form-group">
            <button type="submit" id="submit" class="submit-button">
                Modifier
            </button>
        </div>
        
    </form>
<?php $content = ob_get_clean(); ?>

<?php require 'templates/layout.php'; ?>