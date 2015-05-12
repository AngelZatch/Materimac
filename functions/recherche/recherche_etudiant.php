<?php
    session_start();
    require_once '../../settings/db_connect.php' ;
    global $conn;
    
    /*if(isset($_GET['query'])) {
        $query = htmlentities($_GET['query']);
 
        // Requête SQL
        $sql = "SELECT nom FROM etudiant WHERE nom LIKE '". $query ."%' LIMIT 0, 10";        
        $etudiants = mysqli_query($conn, $sql);
 
        // On parcourt les résultats de la requête SQL
        while($etudiant = mysqli_fetch_assoc($etudiants)) {
            // On ajoute les données dans un tableau
            $json['suggestions'][] = $etudiant['nom'].' '.$etudiant['prenom'];
        }
 
        // On renvoie le données au format JSON pour le plugin
        echo json_encode($json);
    }*/

    if(isset($_GET['query'])) {
        // Mot tapé par l'utilisateur
        $q = htmlentities($_GET['query']);
 
        // Requête SQL
        $requete = "SELECT nom FROM etudiant WHERE nom LIKE '". $q ."%' LIMIT 0, 10";
 
        // Exécution de la requête SQL
        $resultat = $bdd->query($requete) or die(print_r($bdd->errorInfo()));
 
        // On parcourt les résultats de la requête SQL
        while($donnees = $resultat->fetch(PDO::FETCH_ASSOC)) {
            // On ajoute les données dans un tableau
            $suggestions['suggestions'][] = $donnees['nom_fr_fr'];
        }
 
        // On renvoie le données au format JSON pour le plugin
        echo json_encode($suggestions);
    }
?>