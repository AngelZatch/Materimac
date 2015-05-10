<?php
    session_start();
    require_once '../../settings/db_connect.php';
    global $conn;

    if(isset($_POST['materiel_id'])) {
        supprimerMaterielPanier();
    }

    if(isset($_POST['set_id'])) {
        supprimerSetPanier();
    }

    /* Supprimer un matériel du panier */
    function supprimerMaterielPanier() {
        global $conn;
        $id_etudiant = '103832';
        $id = $_POST['materiel_id'];
        $sql = "DELETE FROM panier WHERE id_materiel = $id AND id_etudiant = $id_etudiant";

        if (mysqli_query($conn, $sql)) {
            echo "Successfully deleted from basket";
        } else {
            echo "Error occured while deleting product from basket: " . mysqli_error($conn);
        }
    }

    /* Supprimer un set du panier */
    function supprimerSetPanier() {
        global $conn;
        $id_etudiant = '103832';
        $id = $_POST['set_id'];
        $sql = "DELETE FROM panier WHERE id_set = $id AND id_etudiant = $id_etudiant";

        if (mysqli_query($conn, $sql)) {
            echo "Successfully deleted from basket";
        } else {
            echo "Error occured while deleting product from basket: " . mysqli_error($conn);
        }
    }
?>