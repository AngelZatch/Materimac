<?php

    /* AJOUT D'UNE CATEGORIE */
    if(isset($_POST['addCategorie'])){
        ajouterCategorie();
    }

    function ajouterCategorie() {
        global $conn;
        $nom = $_POST['nom'];

        $sql = "INSERT INTO categorie (nom) VALUES ('$nom')";
        mysqli_query($conn, $sql);
    }

    /* SELECTION DE TOUTES LES CATEGORIES */
    function getCategorie() {
        global $conn;
        $sql = "SELECT id, nom FROM categorie";
        $result = mysqli_query($conn, $sql);
        return $result;
    }


    /* SELECTION D'UNE SEULE CATEGORIE */
    function fetchCategorie($id) {
        global $conn;
        $sql = "SELECT id, nom FROM categorie WHERE id=$id";
        $result = mysqli_query($conn, $sql);
        return $result;
    }


    if(isset($_POST['deleteCategorie'])){
        supprimerCategorie();
    }

    /* SUPPRESSION D'UNE CATEGORIE */
    function supprimerCategorie() {
        global $conn;
        $id = $_POST['id'];
        $sql1 = "DELETE FROM categorie WHERE id=$id";
        mysqli_query($conn, $sql1);        
        $sql2 = "UPDATE materiel SET categorie_id = '0' WHERE categorie_id = '$id'";
        mysqli_query($conn, $sql2);
    }


?>