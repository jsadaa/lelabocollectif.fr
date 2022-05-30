<?php 

require 'src/models/contact.php';

function displayContact() 
{
    require('templates/front/contact.php');
}

function displaySubmitContact() 
{
    $name = $_POST['name'];
    $mail = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $attachmentState = 'Aucun fichier en pièce jointe';
    require 'templates/front/submitContact.php';
}