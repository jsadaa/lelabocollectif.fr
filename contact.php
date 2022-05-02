<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="./style/form_stylesheet.css">
	<title>Le Labo Collectif - Contact</title>
</head>

<body>
  
  <div id="bloc_page">

    <?php include_once('header.php');?>

    <!--Contact Form-->
        
    <form id="contact-form" action="submit_contact.php" method="post" enctype="multipart/form-data">

      <h2>Contactez-nous</h2>
            
      <div class="form-group"> 
        <label for="name" id="name-label">Nom</label>
        <input type="text" id="name" class="form-control" name="name" placeholder="Entrez votre Nom">
      </div>
          
      <div class="form-group">   
        <label for="email" id="email-label">Email</label>
        <input type="email" id="email" class="form-control" name="email" placeholder="Entrez votre Email">
      </div>

      <div class="form-group"> 
        <label for="subject" id="subject-label">Sujet</label>
        <input type="text" id="subject" class="form-control" name="subject" placeholder="Sujet">
      </div>
                      
      <div class="form-group">
        <p>Message</p>
        <textarea id="demande" class="form-control" name="message" placeholder="Ecrivez quelque chose..."></textarea>
      </div>

      <div class="form-group">
        <p>Joindre une image (jpg, jpeg, gif, png)<p>
        <input type="file" class="form-control" id="file" name="file">
      </div>
            
      <div class="form-group">
        <button type="submit" id="submit" class="submit-button">
        Envoyer
        </button>
      </div>
    </form>

    <?php include_once('footer.php'); ?>
        
  </div>
</body>
</html>