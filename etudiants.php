<?php
require_once 'lib/config.php';

function editEtudiant(){
    
}

$prenom = $_POST['prenom'];
$nom = $_POST['nom'];
$num = $_POST['numero_etudiant'];
$id = $_POST['identifiant'];

$req = $bdd->prepare("UPDATE etudiant SET prenom = '$prenom', nom='$nom', numero_etudiant='$num' WHERE identifiant = '$id'");
$req->execute(array(
    'prenom' => $prenom,
    'nom' => $nom,
    'numero_etudiant' => $num));

header('Location: test.php');
?>


<?php /*include("../settings/db_connect.php");*/

/* AJOUT*/
function ajouterMateriel() {
    global $conn;
    
    $sql = "INSERT INTO materiel (nom,reference,numero_cn,numero_proprietaire,description,note,set_id,etat_id,disponibilite_id) VALUES ('Test', 'Référence', 'CN-1770', 'IMAC-13', 'Ceci est un test.', 'Espérons que ça fonctionne', '0', '1', '1')";
    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
/*ajouterMateriel();*/


/* SELECTION */
function afficherMateriel() {
    global $conn;
    $sql = "SELECT nom, reference, numero_cn FROM materiel";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            echo "<br>Nom : " . $row["nom"]. " - Référence : " . $row["reference"]. " - N° CN : " . $row["numero_cn"]. "<br>";
        }
    } else {
        echo "0 results";
    } 
}
/*afficherMateriel();*/


/* SUPPRESSION */
function supprimerMateriel($id) {
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