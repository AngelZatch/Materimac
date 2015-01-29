<?php

    /* AJOUT D'UNE CATEGORIE */
    if(isset($_POST['addCategorie'])){
        ajouterCategorie();
    }

    function ajouterCategorie() {
        global $conn;
        $nom = $_POST['nom'];

        $sql = "INSERT INTO categorie (nom) VALUES ('$nom')";
        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }

    /* SELECTION DE TOUTES LES CATEGORIES */
    function getCategorie() {
        global $conn;
        $sql = "SELECT id, nom FROM categorie";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0) {
            return $result;
        } else {
            echo "0 results";
        }
    }


    /* SELECTION D'UNE SEULE CATEGORIE */
    function fetchCategorie($id) {
        global $conn;
        $sql = "SELECT id, nom FROM categorie WHERE id=$id";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0) {
            return $result;
        } else {
            echo "0 results";
        }
    }


    if(isset($_POST['deleteCategorie'])){
        supprimerCategorie();
    }

    /* SUPPRESSION D'UNE CATEGORIE */
    function supprimerCategorie() {
        global $conn;
        $id = $_POST['id'];
        $sql1 = "DELETE FROM categorie WHERE id=$id";

        if (mysqli_query($conn, $sql1)) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }
        
        $sql2 = "UPDATE materiel SET categorie_id = '0' WHERE categorie_id = '$id'";
        if (mysqli_query($conn, $sql2)) {
            echo "Record updated successfully";
        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }
    }


?>