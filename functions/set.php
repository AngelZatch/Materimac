<?php

    /* AJOUT D'UN MATERIEL */
    if(isset($_POST['addSet'])){
        ajouterSet();
    }

    function ajouterSet() {
        global $conn;
        $nom = $_POST['nom'];
        $description = $_POST['description'];
        $categorie = $_POST['categorie'];
        $dispo = $_POST['dispo'];

        $sql = "INSERT INTO set_materiel (nom, fiche_technique, description, categorie_id, disponibilite_id) VALUES ('$nom', '', '$description', '$categorie', '$dispo')";
        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully";
            $sql2 = "SELECT id FROM set_materiel WHERE nom = '$nom'";
            echo $nom;
           $result2 = mysqli_query($conn, $sql2);

            if (mysqli_num_rows($result2) > 0) {
                $id = mysqli_fetch_assoc($result2)['id'];
                header('Location: set_edit.php?id='.$id.'');
            } else {
                echo "0 results";
            } 
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }


    /* MODIFICATION D'UN MATERIEL */
    if(isset($_POST['updateSet'])){
        editSet();
    }

    function editSet() {
        global $conn;
        $id = $_POST['id'];
        $nom = $_POST['nom'];
        $description = $_POST['description'];
        $categorie = $_POST['categorie'];
        $dispo = $_POST['dispo'];
        
        $sql = "UPDATE set_materiel SET nom = '$nom', description = '$description', categorie_id = '$categorie', disponibilite_id = '$dispo' WHERE id = '$id'";
        
        if (mysqli_query($conn, $sql)) {
            echo "Updated successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }


    /* SELECTION DE TOUS LES MATERIELS */
    function getSet() {
        global $conn;
        $sql = "SELECT id, nom, disponibilite_id, categorie_id FROM set_materiel";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            return $result;
        } else {
            echo "0 results";
        } 
    }


    /* SELECTION D'UN SEUL MATERIEL */
    function fetchSet($id) {
        global $conn;
        $sql = "SELECT id, nom, fiche_technique, description, disponibilite_id, categorie_id FROM set_materiel WHERE id = '$id'";
        $result = mysqli_query($conn, $sql);

         if(mysqli_num_rows($result) > 0) {
            return $result;
        } else {
            echo "0 results";
        }

    }

    if(isset($_POST['deleteSet'])){
        supprimerSet();
    }

    /* SUPPRESSION */
    function supprimerSet() {
        global $conn;
        $id = $_POST['id'];
        $sql = "DELETE FROM set_materiel WHERE id=$id";

        if (mysqli_query($conn, $sql)) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }
    }


?>