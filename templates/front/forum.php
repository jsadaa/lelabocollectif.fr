<?php 
$titre = 'Le Labo Collectif - Espace Collaboratif';
$css = "public/css/forum.css";?>

<?php ob_start(); ?>
    <div class="container">

        <div class="login-success" role="alert">
            Bonjour <?= $_SESSION['LOGGED_USER_NAME']; ?> (<?= $_SESSION['LOGGED_USER']; ?>) et bienvenue dans l'espace collaboratif !
        </div>

        <a id="create" href="index.php?action=displayCreatePost">Créer une publication</a> 

        <?php if (!empty($posts)): ?>
            <?php foreach(getPosts($posts) as $post) : ?>

                <article>
                    <h2 id="post_title"><?= $post['title']; ?></h2>
                    <div class="posts"><?= $post['post']; ?></div>
                    <p><?php echo displayAuthor($post['author'], $users); ?></p>
                    <?php
                    if((isset($_SESSION['LOGGED_USER']) && $post['author'] === $_SESSION['LOGGED_USER_NAME']) || $_SESSION['LOGGED_USER_IS_ADMIN']): ?>
                    <div class="modify-div">
                        <a class="modify-post" href="index.php?action=displayUpdatePost&id=<?= $post['post_id']; ?>">Modifier</a>
                        <a class="modify-post" href="index.php?action=displayDeletePost&id=<?= $post['post_id']; ?>">Supprimer</a>
                    </div>
                    <?php endif; ?>
                </article>

            <?php endforeach ?>
        <?php else: ?>
            <h2>Il n'y a aucune publication pour le moment. Créez-en une !</h2>
        <?php endif; ?>
            <a id="logout" href="index.php?action=displayLogout">Déconnexion</a>
            <a id="logout" class="delete_link" href="index.php?action=displayDeleteUser&id=<?= $_SESSION['LOGGED_USER_NAME'];?>">Supprimer mon compte</a>
    </div>
<?php $content = ob_get_clean(); ?>

<?php require 'templates/layout.php'; ?>