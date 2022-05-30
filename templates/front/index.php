<?php 
$titre = "Le Labo Collectif - Accueil";
$css = "./public/css/index.css";?>

<?php ob_start(); ?>
	<div class="sections">
		<section class="section_left">
				<p class="presentation">
					Soucieuses de contribuer au mieux vivre ensemble qui parvient à s’introduire dans nos sociétés, nous avons créé une structure d’écoute, d’échange et de partage sur comment gérer au mieux les conflits auxquels nous faisons face. C’est au niveau de l’éducation qu’il faut intervenir afin que les citoyens de demain aient une attitude appropriée et positive face aux conflits ainsi qu’une vision apaisée des relations humaines. En agissant tôt, dès la maternelle notre but est bien de rendre les enfants acteurs de leur devenir en société.<br>
					L’un des concepts moteur de l’association est la pluridisciplinarité, nous favorisons la rencontre des regards pour une approche plus juste de la résolution non violente des conflits.
				</p>
		</section>

		<section class="section_right">
				<aside class="visuel">
					<img src="./public/pictures/visuel_labo_collectif_1024x1078.png" alt="visuel" class="image_visuel" id="visu_id"> 
				</aside>
		</section>
	</div>

	<div class="section_bottom">
		<section class="section_bottom">
			<div class="video">
				<iframe src="https://player.vimeo.com/video/315274454?h=5a865d0457" width="800" height="514" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
			</div>
		</section>
	</div>

	<div class="bandeau_icones">
			<p><img src="./public/pictures/pictograms/002-friendship.png" class="ico" alt="Icone 1">
			</p>
			<p><img src="./public/pictures/pictograms/002-meditation.png" class="ico" alt="Icone 2">
			</p>
			<p><img src="./public/pictures/pictograms/003-call-center-1.png" class="ico" alt="Icone 3">
			</p>
			<p><img src="./public/pictures/pictograms/003-target.png" class="ico" alt="Icone 4">
			</p>
			<p><img src="./public/pictures/pictograms/004-key.png" class="ico" alt="Icone 5">
			</p>
			<p><img src="./public/pictures/pictograms/006-helping.png" class="ico" alt="Icone 6">
			</p>
			<p><img src="./public/pictures/pictograms/005-communication.png" class="ico" alt="Icone 7">
			</p>
	</div>		

	<div class="team">
		<article>
			<h2 class="titre_equipe">&Eacute;quipe</h2>
			<p class="presentation_equipe">
				Mathilde Pradat : <span class="span_equipe">Co-fondatrice et Présidente</span><br>
				Nina Vernay : <span class="span_equipe">Co-fondatrice et Médiatrice scolaire</span><br>
				Salea Pradat : <span class="span_equipe">Infirmière Sophrologue</span><br>
				Anne-Gaëlle Goujon : <span class="span_equipe">Psychologue clinicienne, Cycle 1 thérapie familiale psychanalytique</span><br>
				Élodie Vernay : <span class="span_equipe">Secrétaire et Professeure des écoles</span><br>
				Marion Godon : <span class="span_equipe">Comédienne et Intervenante en atelier théâtre</span><br>
				<br>
				En partenariat avec La Clinique de la Médiation,
				Université Lumière Lyon II
			</p>
		</article>
	</div>	
<?php $content = ob_get_clean(); ?>

<?php require 'templates/layout.php'; ?>

