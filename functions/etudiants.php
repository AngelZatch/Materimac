<?php
if(isset($_POST['submitChange'])){
    editEtudiant();
}

/* AFFICHER TOUS LES ETUDIANTS */
function afficherEtudiants() {
    global $conn;
    $sql = "SELECT prenom, nom, numero_etudiant FROM etudiant";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            echo "<form action='edit_etudiant.php'>
            <br>Nom : " . $row["prenom"]. " " . $row["nom"]. " - N° Etudiant : " . $row["numero_etudiant"]. " <input type='submit' value='Modifier'></input><br>
            </form>";
        }
    } else {
        echo "Aucun résultat";
    } 
}
/*afficherEtudiants();*/

/* AFFICHER UN SINGLETON */
function fetchEtudiant(){
    global $conn;
    $sql = "SELECT prenom, nom, numero_etudiant, identifiant FROM etudiant WHERE numero_etudiant = '102555'";
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
    $sql = "UPDATE etudiant SET prenom = '$prenom', nom = '$nom', numero_etudiant = '$num' WHERE numero_etudiant='102555'";
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