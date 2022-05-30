<?php

function sendMail()
{
    try 
    {
        $name = $_POST['name'];
        $mail = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];
        require ('src/models/hiddenVariables.php');
        require ('vendor/phpmailer/PHPMailer.php');
        require ('vendor/phpmailer/SMTP.php');
        $email = new PHPMailer\PHPMailer\PHPMailer();
        $email->IsSMTP();
        $email->SMTPAuth = true;
        $email->SMTPSecure = 'ssl';
        $email->Host = "smtp.gmail.com";
        $email->Port = 465;
        $email->IsHTML(true);
        $email->CharSet = 'UTF-8';
        $email->WordWrap   = 50; 	
        $email->Username = $gmailAccount;
        $email->Password = $gmailPassword;
        $email->SetFrom($mail);
        $email->addReplyTo($mail);
        $email->From = $mail;
        $email->FromName = $name;
        $email->AddAddress($gmailAccount);
        $email->Subject = 'Contact from Le Labo Collectif :' . $subject;
        $email->Body = $message;
        $contactValidation = 'Message bien envoyé !';
        if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) 
        {
            $fileName = $_FILES['file']['name'];
            $fileExist = true;
            if ($_FILES['file']['size'] <= 1000000)
            {
                $fileInfo = pathinfo($_FILES['file']['name']);
                $extension = $fileInfo['extension'];
                $allowedExtensions = ['jpg', 'jpeg', 'gif', 'png'];
                if (in_array($extension, $allowedExtensions))
                {
                    $newfilename= date('dmYHis') . "-" . $_POST["name"] . "." . $extension;
                    move_uploaded_file($_FILES["file"]["tmp_name"], "uploads/" . $newfilename);  
                    $attachmentState = $fileName . ' a bien été envoyé !';  
                } else {
                    $attachmentState = ' Le fichier : ' . $fileName . ' n\'est pas valide pour l\'envoi (fichiers autorisés : .jpg, .jpeg, .gif, .png)';
                }
            }
        }
        if (isset($fileExist) && $fileExist === true) 
        {
            $filePath = 'uploads/' . $newfilename;
            $email->addAttachment($filePath, $fileName);
        }
        $email->Send();
    } catch(Exception $e)
    {
        $msgErreur = $e->getMessage();
        require 'templates/front/error.php';
    }  
}  