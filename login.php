<?php
session_start();
require_once 'settings/db_connect.php';
$error = "";
if(isset($_POST['submit'])){
    if(empty($_POST['id']) || empty($_POST['pwd'])){
        $error = "Identifiant ou Mot de passe non renseigné.";
    } else {
        global $conn;
        $identifiant = $_POST['id'];
        $password = $_POST['pwd'];
        
        $identifiant = stripslashes($identifiant);
        $password = stripslashes($password);
        $identifiant = mysql_real_escape_string($identifiant);
        $password = mysql_real_escape_string($password);
        
        $result = mysqli_query($conn, "SELECT * FROM etudiant WHERE identifiant = '$identifiant' AND mot_de_passe = '$password'");
        if(mysqli_num_rows($result) != 1){
            $result = mysqli_query($conn, "SELECT * FROM gestionnaire WHERE identifiant = '$identifiant' AND mot_de_passe = '$password'");
        }
        if(mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_assoc($result);

            $_SESSION['power'] = $row['user_type_id'];            
            $_SESSION['prenom'] = $row['prenom'];
            $_SESSION['nom'] = $row['nom'];
            $_SESSION['id'] = $_POST['id'];
			if($row['user_type_id'] == 1) $_SESSION['gestionnaire'] = $row['id'];
				else $_SESSION['gestionnaire'] = null;
			if($row['user_type_id'] == 2) $_SESSION['etudiant'] = $row['numero_etudiant'];
				else $_SESSION['etudiant'] = null;
            
            if($_SESSION['power'] == "1") header("location:dashboard.php");
            if($_SESSION['power'] == "2") header("location:home.php");
			if($_SESSION['power'] == "3") header("location:local_dashboard.php");
        } else {
            $error = "Informations invalides";
        }
    }
}

?>