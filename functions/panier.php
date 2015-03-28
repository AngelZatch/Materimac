<?php
   if(isset($_POST['addPanierMateriel'])){
        ajouterMaterielPanier();
    }

    /* Ajouter un matériel au panier */
    function ajouterMaterielPanier() {
        global $conn;
        $id = $_POST['id'];
        $sql = "INSERT INTO panier (id_etudiant, id_materiel) VALUES ('105832', '$id')";

        if (mysqli_query($conn, $sql)) {
            echo "Successfully added to basket";
        } else {
            echo "Error occured while adding product to basket: " . mysqli_error($conn);
        }
    }

    /* Afficher le panier */
    function getPanier() {
        global $conn;
        $sql = "SELECT id_materiel FROM panier WHERE id_etudiant = '105832'";
        $result = mysqli_query($conn, $sql);
        
        if (mysqli_num_rows($result) > 0) {
            return $result;
        } else {
            echo "0 results";
        } 
    }

   if(isset($_POST['deletePanierMateriel'])){
        supprimerMaterielPanier();
    }

    /* Supprimer un matériel du panier */
    function supprimerMaterielPanier() {
        global $conn;
        $id = $_POST['id'];
        $sql = "DELETE FROM panier WHERE id_materiel = $id";

        if (mysqli_query($conn, $sql)) {
            echo "Successfully deleted from basket";
        } else {
            echo "Error occured while deleting product from basket: " . mysqli_error($conn);
        }
    }
?>