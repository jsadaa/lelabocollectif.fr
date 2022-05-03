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

<?php

//Variables for contact mail details
$name = $_POST['name'];
$mail = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

//Variables for attchment files process
$fileName = $_FILES['file']['name'];
$stringExtensionValid = 'Aucun fichier en pièce jointe';
$fileExist = false; ?>

<?php include_once('header.php'); ?>

<?php 
//If the email is not valid, and if the form is not filled, we display an error message
if ((!isset($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
    || (!isset($_POST['message']) || empty($_POST['message']))
    ): ?>

<div id="contact-error">
    <p>Il faut un email et un message valides pour soumettre le formulaire...</p>
    <a href="contact.php">Retour au formulaire</a>
</div>

<?php else: ?>

<?php 
//If there is an attachment file, we process it 
// We test if the file is sent and if there is no error
if (isset($_FILES['file']) && $_FILES['file']['error'] == 0)
{
        // We test the file size
        $fileExist = true;
        if ($_FILES['file']['size'] <= 1000000)
        {
                // We test if extension is allowed
                $fileInfo = pathinfo($_FILES['file']['name']);
                $extension = $fileInfo['extension'];
                $allowedExtensions = ['jpg', 'jpeg', 'gif', 'png'];
                if (in_array($extension, $allowedExtensions))
                {
                        // If the extension is allowed, we validate the file and store it
                        $newfilename= date('dmYHis') . "-" . $_POST["name"] . "." . $extension;
                        move_uploaded_file($_FILES["file"]["tmp_name"], "uploads/" . $newfilename);
                        $stringExtensionValid = $fileName . ' a bien été envoyé !';
                } else {
                    // If not we display an error message in the contact mail details
                    $stringExtensionValid = ' Le fichier : ' . $fileName . ' n\'est pas valide pour l\'envoi (fichiers autorisés : .jpg, .jpeg, .gif, .png)';
                }
        }
}
?>



<?php
include_once('variables.php');
//We use Phpmailer to send an email from the contact form
require './phpmailer/PHPMailer.php';
require './phpmailer/SMTP.php';
$email = new PHPMailer\PHPMailer\PHPMailer();
//We set up necessary configuration to send email
$email->IsSMTP();
$email->SMTPAuth = true;
$email->SMTPSecure = 'ssl';
$email->Host = "smtp.gmail.com";
$email->Port = 465;
$email->IsHTML(true);
$email->CharSet = 'UTF-8';
$email->WordWrap   = 50; 	
//We set the gmail address that will be used for sending email
$email->Username = $gmailAccount;
//We set the valid password for the gmail address
$email->Password = $gmailPassword;
//We set the sender email address 
$email->SetFrom($mail);
$email->addReplyTo($mail);
$email->From = $mail;
$email->FromName = $name;
//We set the receiver email address
$email->AddAddress($gmailAccount);
$email->Subject = 'Contact from Le Labo Collectif :' . $subject;
$email->Body = $message;

//If there is an attachment file, we collect it and put it in the mail
if ($fileExist === true) {
$filePath = 'uploads/' . $newfilename;
$email->addAttachment($filePath, $fileName);
}

//We send the mail
if(!$email->Send()) {

    $contactValidation = 'Votre message n\'a pas pu être envoyé...';

} else {

    $contactValidation = 'Message bien envoyé !';

}
?>

<div id="contact-confirmation">
    <h1><?php echo($contactValidation) ?></h1>
    <h5>Rappel de vos informations</h5>
    <p><b>Nom</b> : <?php echo strip_tags($name); ?></p>
    <p><b>Email</b> : <?php echo $mail; ?></p>
    <p><b>Sujet</b> : <?php echo strip_tags($subject); ?></p>
    <p><b>Message</b><span id="message_detail"> : <?php echo strip_tags($message); ?></span></p>
    <p><b>Fichier</b> : <?php echo ($stringExtensionValid); ?></p>
    <p><a class="return_link" href="index.php">Retour à l'accueil</a></p>
</div>

<?php endif; ?>
  
<?php include_once('footer.php'); ?>

</body>
</html>