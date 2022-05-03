<?php session_start();?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Le Labo Collectif - Espace Collaboratif</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./style/forum_stylesheet.css" rel="stylesheet" type="text/css">
</head>
<body>

    <div id="bloc_page">

        <?php include_once('functions.php');?>

        <?php include_once('./config/mysql.php')?>

        <?php include_once('header.php'); ?>

        <?php include_once('login.php'); ?>

        <?php 
        //Variable to display message if there is no posts
        $postsExist = false ?>

        <div class="container">

            <?php 
            //If the user is logged in, we display posts and features
            if(isset($_SESSION['LOGGED_USER'])): ?>

                <a id="create" href="create_post.php">Créer une publication</a> 
                
                <!--We display the posts-->
                <?php foreach(getPosts($posts) as $post) : ?>
                    <?php $postsExist = true ?>
                    <article>
                        <h2 id="post_title"><?php echo $post['title']; ?></h2>
                        <div class="posts"><?php echo $post['post']; ?></div>
                        <p><?php echo displayAuthor($post['author'], $users); ?></p>
                        <!--We only display the features if the user is the creator of the post or the admin-->
                        <?php if((isset($_SESSION['LOGGED_USER']) && $post['author'] === $_SESSION['LOGGED_USER_NAME']) || $_SESSION['LOGGED_USER_ACCOUNT_TYPE'] === true): ?>
                        <div class="modify-div">
                            <a class="modify-post" href="update_post.php?id=<?php echo($post['post_id']); ?>">Modifier</a>
                            <a class="modify-post" href="delete_post.php?id=<?php echo($post['post_id']); ?>">Supprimer</a>
                        </div>
                        <?php endif; ?>
                    </article>
                <?php endforeach ?>
                 
                <?php 
                //if there is no posts, we display a message
                if($postsExist === false):?>

                    <h2>Il n'y a aucune publication pour le moment. Créez-en une !</h2>

                <?php endif;?>

                <a id="logout" href="logout.php">Déconnexion</a>
                <a id="logout" class="delete_link" href="delete_user.php?id=<?php echo($_SESSION['LOGGED_USER_NAME']);?>">Supprimer mon compte</a>
                
            <?php endif; ?>
        </div>

        <?php include_once('footer.php'); ?>

    </div>
</body>
</html>

