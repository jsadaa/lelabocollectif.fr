<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href=<?= $css ?>>
	<title><?= $titre ?></title>
</head>
<body>

    <div id="bloc_page">

        <header>
			<div class="logo">
				<h1>Le Labo Collectif</h1>
				<p>Facilitateur de dialogue</p>
			</div>
		</header>

		<nav class="menu">
            <a href="index.php">Accueil</a>
			<a href="index.php?action=displayDocumentation">Documentation</a>			
			<a href="index.php?action=displayContact">Contact</a>
			<a href="index.php?action=displayForum">Espace Collaboratif</a>
		</nav>

        <div id=content>
            <?= $content ?>
        </div>

        <footer>
	        <div class="liens_asso">
		        <a href="https://www.helloasso.com/associations/le-labo-collectif/adhesions/le-labo-des-emotions">Adhérer à l'association</a><br>
		        <a href="https://www.helloasso.com/associations/le-labo-collectif/formulaires/1/widget">Faire un don au labo collectif</a>
	        </div>

	        <div class="social_media">
		        <a href="https://www.facebook.com/LeLaboCollectif69">Nous suivre sur Facebook</a>
	        </div>
        </footer>

        <div class="copyright">
            <p>&copy; Le Labo Collectif. Tous droits réservés</p>
        </div>

    </div>

</body>
</html>