<?php
require_once 'lib/config.php';

function editEtudiant(){
    
}

$prenom = $_POST['prenom'];
$nom = $_POST['nom'];
$num = $_POST['numero_etudiant'];
$id = $_POST['identifiant'];

$req = $bdd->prepare("UPDATE etudiant SET prenom = '$prenom', nom='$nom', numero_etudiant='$num' WHERE identifiant = '$id'");
$req->execute(array(
    'prenom' => $prenom,
    'nom' => $nom,
    'numero_etudiant' => $num));

header('Location: test.php');
?>