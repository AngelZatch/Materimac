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
/*afficherPromotion();*/

/* AFFICHER TOUS LES ETUDIANTS */
function afficherEtudiants($data) {
    global $conn;
    $sql = "SELECT prenom, nom, numero_etudiant, identifiant FROM etudiant WHERE promotion_id = '$data' AND user_type_id='2'";
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
                        <td><a class='btn btn-default' href='edit_etudiant.php?nom=".$row["identifiant"]."'><span class='glyphicon glyphicon-pencil'></span> Modifier</a></td>
                    </tr>
                </form>";
        }
        echo "</tbody>";
    } else {
        echo "Aucun résultat";
    } 
}
/*afficherEtudiants();*/

/* AFFICHER ETUDIANTS NON VALIDES */
function afficherNonValides(){
    global $conn;
    $sql = "SELECT prenom, nom, numero_etudiant, identifiant FROM etudiant WHERE valide='0'";
    $result = mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($result) > 0){
        echo "<tbody>";
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>
                    <td>" . $row["prenom"] . "</td>
                    <td>" . $row["nom"] . "</td>
                    <td>" . $row["numero_etudiant"] . "</td>
                    <td></td>
                    <td>
                        <button class='btn btn-success'>Valider</button>
                        <a href='edit_etudiant.php?nom=".$row["identifiant"]."' class='btn btn-default'>Consulter</a>
                    </td>";
        }
        echo "</tbody>";    
    }
}
/*afficherNonValides();*/

/* VALIDER ETUDIANT */
/*function vailderEtudiant(){
    global $conn;
    $sql = "UPDATE valide FROM etudiant WHERE id="
}*/

/* AFFICHER UN SINGLETON */
function fetchEtudiant($data){
    global $conn;
    $sql = "SELECT prenom, nom, numero_etudiant, identifiant, valide, promotion_id FROM etudiant WHERE identifiant = '$data' AND user_type_id='2'";
    $result = mysqli_query($conn, $sql);
    return $result;
}
/*fetchEtudiant($data);*/

/* AFFICHER LES PROMOTIONS PENDANT L'EDITION D'UN ETUDIANT */
function fetchPromotion($annee){
    global $conn;
    $sql = "SELECT * FROM promotion";
    $result = mysqli_query($conn, $sql);
    echo "<select class='form-control' name='annee'>";
    while($row = mysqli_fetch_assoc($result)){
        if($row["annee"]==$annee){
            echo "<option selected='selected' value=".$row["annee"].">".$row["annee"]."</option>";
        } else {
            echo "<option value=".$row["annee"].">".$row["annee"]."</option>";
        }
    }
    echo "</select>";
}
/*fetchPromotion($annee);*/

/*MODIFICATION*/
function editEtudiant(){
    global $conn, $row;
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $num = $_POST['numero_etudiant'];
    $id = $_POST['identifiant'];
    $annee = $_POST['annee'];
    $sql = "UPDATE etudiant SET prenom = '$prenom', nom = '$nom', numero_etudiant = '$num', promotion_id = '$annee' WHERE identifiant = '$id'";
    if(mysqli_query($conn, $sql)){
        header('Location: liste_etudiants.php?annee='.$annee.'');
    } else {
        echo "Erreur dans l'édition des données : " . mysqli_error($conn);
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