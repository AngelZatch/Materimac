<?php
    session_start();
    require_once '../../settings/db_connect.php';
    global $conn;

    if(isset($_POST['materiel_id'])) {
        ajouterMaterielPanier();
    }

    if(isset($_POST['set_id'])) {
        ajouterSetPanier();
    }
       
    function ajouterMaterielPanier() {
        global $conn;

        $id = $_POST['materiel_id'];
        $id_etudiant = $_SESSION['id'];
        $sql = "INSERT INTO panier (id_etudiant, id_materiel, id_set) VALUES ('$id_etudiant', '$id', '0')";

        if (mysqli_query($conn, $sql)) {
            echo "Successfully added to basket";
        } else {
            echo "Error occured while adding product to basket: " . mysqli_error($conn);
        }
    }

    function ajouterSetPanier() {
            global $conn;

            $id = $_POST['set_id'];
            $id_etudiant = $_SESSION['id'];
            $sql = "INSERT INTO panier (id_etudiant, id_materiel, id_set) VALUES ('$id_etudiant', '0', '$id')";

            if (mysqli_query($conn, $sql)) {
                echo "Successfully added to basket";
            } else {
                echo "Error occured while adding product to basket: " . mysqli_error($conn);
            }
        }
?>