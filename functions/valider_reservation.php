<?php
    if(isset($_POST['validerResa'])) {
        validerReservation();        
    }

    function validerReservation() {
        global $conn;
        $etudiant_id = $_SESSION['id'];
        $date_debut = $_POST['dateDebut'];
        $date_fin = $_POST['dateFin'];
        $enseignant = $_POST['enseignant'];
        $raison = $_POST['motif'];
        $reference = genererReference();
        $paniers = getPanier();
        
        $sql1 = "INSERT INTO emprunt (reference, date_debut, date_fin, nom_enseignant, raison, etudiant_id, etat_emprunt_id) VALUES ('$reference', '$date_debut', '$date_fin', '$enseignant', '$raison', '$etudiant_id', '1')";
        
        mysqli_query($conn, $sql1);
        
        while($panier = mysqli_fetch_assoc($paniers)) {
            $materiel = $panier['id_materiel'];
            $set = $panier['id_set'];
            $sql = "INSERT INTO detail_emprunt (reference, materiel_id, set_id) VALUES ('$reference', '$materiel', '$set')";
            mysqli_query($conn, $sql);
        }
              
        $sql2 = "DELETE FROM panier WHERE id_etudiant = '$etudiant_id'";
        mysqli_query($conn, $sql2);
    }

    function genererReference() {
        $length = 10;
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $chars_length = strlen($characters);
        $reference = '';
        for ($i = 0; $i < $length; $i++) {
            $reference .= $characters[rand(0, $chars_length - 1)];
        }
        return $reference;
    }

    function getPanier() {
        global $conn;
        $etudiant_id = $_SESSION['id'];
        
        $sql = "SELECT * FROM panier WHERE id_etudiant = '$etudiant_id'";
        $result = mysqli_query($conn, $sql);
        
        if(mysqli_num_rows($result) > 0) {
            return $result;
        }
    }
?>