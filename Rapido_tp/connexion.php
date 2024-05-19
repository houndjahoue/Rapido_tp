<?php

$serverName = 'localhost';
$dataBase = 'transportManager';
$userName = 'root';
$password = '';


try {
    $connexion = new PDO("mysql:host=$serverName;dbname=$dataBase",$userName,$password);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (PDOException $e) {
    echo 'Erreur'.$e->getMessage();
}

?>