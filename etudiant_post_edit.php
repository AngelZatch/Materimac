<?php
require_once 'lib/config.php';

$req = $bdd->prepare('INSERT INTO etudiant (prenom, nom, numero_etudiant), VALUES(?, ?, ?)');
$req->execute(array($_POST['prenom'], $_POST['nom'], $_POST['numero_etudiant']));

header('test.php');
?>