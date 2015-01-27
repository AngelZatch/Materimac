<?php
if(isset($_POST['submitChange'])){
    editEtudiant();
}

/* AFFICHER LES PROMOTIONS */
function afficherPromotion(){
    global $conn;
    $sql = "SELECT * FROM promotion";
    $result = mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($result) > 0){
        echo "<ul>";
        while($row = mysqli_fetch_assoc($result)){
            echo "<li><a href='liste_etudiants.php?annee=".$row["annee"]."'>IMAC " . $row["annee"] ."</a></li>";
        }
        echo "</ul>";
    }
}

/* AFFICHER TOUS LES ETUDIANTS */
function afficherEtudiants($data) {
    global $conn;
    $sql = "SELECT prenom, nom, numero_etudiant, identifiant FROM etudiant WHERE promotion_id = '$data'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<tbody>";
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            echo "<form action='edit_etudiant.php' method='post'>
                    <tr>
                        <td>" . $row["prenom"]. "</td>
                        <td>" . $row["nom"]. "</td>
                        <td>" . $row["numero_etudiant"]. "</td>
                        <td><a class='btn btn-default' href='edit_etudiant.php?nom=".$row["identifiant"]."'>Modifier</a></td>
                    </tr>
                </form>";
        }
        echo "</tbody>";
    } else {
        echo "Aucun résultat";
    } 
}
/*afficherEtudiants();*/

/* AFFICHER UN SINGLETON */
function fetchEtudiant($data){
    global $conn;
    $sql = "SELECT prenom, nom, numero_etudiant, identifiant, valide FROM etudiant WHERE identifiant = '$data'";
    $result = mysqli_query($conn, $sql);
    return $result;
}
/*fetchEtudiant();*/

/*MODIFICATION*/
function editEtudiant(){
    global $conn;
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $num = $_POST['numero_etudiant'];
    $id = $_POST['identifiant'];
    $sql = "UPDATE etudiant SET prenom = '$prenom', nom = '$nom', numero_etudiant = '$num' WHERE identifiant = '$id'";
    if(mysqli_query($conn, $sql)){
        header('Location: liste_etudiants.php');
    } else {
        echo "Error updating record : " . mysqli_error($conn);
    }
    

}
/*editEtudiant()*/


/* SUPPRESSION */
/*function supprimerMateriel($id) {
    global $conn;
    $sql = "DELETE FROM materiel WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}
/*supprimerMateriel();*/



?>