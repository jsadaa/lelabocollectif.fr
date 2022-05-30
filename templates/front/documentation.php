<?php $titre = 'Le Labo Collectif - Documentation'; ?>
<?php $css = "./public/css/documentation.css";?>

<?php ob_start() ?>
    <section class="plaquettes"> 
        <a href="./public/pictures/pdf/plaquette_mediation.pdf">Télécharger la plaquette médiation</a>      
        <div id="mediation">
            <img src="./public/pictures/booklets/plaquette_mediation/plaquette_mediation_pages-to-jpg-0001.png">
        </div>
    </section>    
    
    <section class="plaquettes"> 
        <a href="./public/pictures/pdf/plaquette_sensibilisation.pdf">Télécharger la plaquette sensibilisation</a>   
        <div id="sensibilisation">
            <img src="./public/pictures/booklets/plaquette_sensibilisation/plaquette_sensibilisation_pages-to-jpg-0001.png">  
        </div> 
    </section>

    <div id="support_link">
        <a href="./public/pictures/pdf/support_mediation.pdf">Télécharger notre support de médiation</a>
    </div>
<?php $content = ob_get_clean(); ?>

<?php require 'templates/layout.php'; ?>