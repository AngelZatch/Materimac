<?php
    if(isset($_POST['validerDemande'])) {
        validerReservation();        
    }

    function validerReservation() {
        global $conn;
        $etudiant_id = $_SESSION['id'];
        $date_debut = $_POST['dateDebut'];
        $date_fin = $_POST['dateFin'];
        $date_soumission_DT = new DateTime('NOW');
        $date_soumission = date_format($date_soumission_DT,'Y-m-d H:i:s');
        $enseignant = $_POST['enseignant'];
        $raison = $_POST['motif'];
        $reference = genererReference();
        $paniers = getPanier();
        $etudiants_post = array($_POST['nom_etudiant1'],$_POST['nom_etudiant2'],$_POST['nom_etudiant3'],$_POST['nom_etudiant4'],$_POST['nom_etudiant5'],$_POST['nom_etudiant6']);
        
        // On crée la nouvelle réservation
        $sql1 = "INSERT INTO emprunt (reference, date_debut, date_fin, date_soumission, nom_enseignant, raison, etudiant_id, etat_emprunt_id) VALUES ('$reference', '$date_debut', '$date_fin', '$date_soumission', '$enseignant', '$raison', '$etudiant_id', '1')";
        mysqli_query($conn, $sql1);
        
        // On ajoute les items du panier à la réservation
        while($panier = mysqli_fetch_assoc($paniers)) {
            $materiel = $panier['id_materiel'];
            $set = $panier['id_set'];
            $sql2 = "INSERT INTO detail_emprunt (reference, materiel_id, set_id) VALUES ('$reference', '$materiel', '$set')";
            mysqli_query($conn, $sql2);
        }
        
        // On supprime le panier
        $sql3 = "DELETE FROM panier WHERE id_etudiant = '$etudiant_id'";
        mysqli_query($conn, $sql3);
        
        // On associe à la réservation les étudiants participants au projet
        foreach($etudiants_post as $etudiant) {
            // On vérifie en premier que inputs des noms d'étudiants n'étaient pas vides
            if(!empty($etudiant)) {
                // Si c'est le cas, on envoie associe l'étudiant à la réservation
                $sql4 = "INSERT INTO groupe_etudiant (reference, etudiant_id) VALUES ('$reference', '$etudiant')";
                if(mysqli_query($conn, $sql4)) {
                    echo "success";
                } else {
                    echo "error";
                }
            }
        }   
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