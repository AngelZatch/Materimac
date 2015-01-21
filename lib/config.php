<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=Materimac', 'root', '');
}
catch(Exception $e)
{
    die('Erreur de connection : ' . $e->getMessage());
}
?>