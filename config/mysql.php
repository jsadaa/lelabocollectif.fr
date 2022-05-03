<?php
include_once('variables.php');

try
{
	// Connexion to MySql
	$mysqlClient = new PDO(
        $sqlConfig,
        $sqlId,
        $sqlPassword,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
    );
}
catch(Exception $e)
{
	// if there is an error, we display a message and stop the process
        die('Erreur : '.$e->getMessage());
}
?>
