<?php
try
{
	// Connexion to MySql
	$mysqlClient = new PDO(
        'mysql:host=db5007429476.hosting-data.io;dbname=dbs6121931;charset=utf8',
        'dbu2184153',
        'High940520102020!',
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
    );
}
catch(Exception $e)
{
	// if there is an error, we display a message and stop the process
        die('Erreur : '.$e->getMessage());
}
?>
