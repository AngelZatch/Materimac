<?php
if(isset($_POST['submitChange'])){
    editEtudiant();
}

/* AFFICHER LES PROMOTIONS */
function afficherPromotion(){
    global $conn;
    $result = mysqli_query($conn, "SELECT * FROM promotion");
    
    if(mysqli_num_rows($result) > 0){
        echo "<ul>";
        while($row = mysqli_fetch_assoc($result)){
            echo "<li><a href='etudiant_liste.php?annee=".$row["annee"]."'>IMAC " . $row["annee"] ."</a><span class='badge'>";
            //Get count badge
            $resultCount = mysqli_query($conn, "SELECT * FROM etudiant WHERE promotion_id=$row[annee] AND valide=0");
            if($row_cnt = mysqli_num_rows($resultCount) > 0) echo $row_cnt;
            echo "</span></li>";
        }
        echo "</ul>";
    }
}
/*afficherPromotion();*/
            
/* AFFICHER TOUS LES ETUDIANTS */
function afficherEtudiants($data) {
    global $conn;
    $sql = "SELECT prenom, nom, numero_etudiant, identifiant, valide FROM etudiant WHERE promotion_id = '$data' AND user_type_id='2'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<tbody>";
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            echo "<form action='etudiant_edit.php' method='post'>
                    <tr>
                        <td class='col-sm-3'>" . $row["prenom"]. "</td>
                        <td class='col-sm-2'>" . $row["nom"]. "</td>
                        <td class='col-sm-2'>" . $row["numero_etudiant"]. "</td>";
            //Affichage du label de validité
            if($row["valide"] == '1') echo "<td class='col-sm-2'><span class='label label-success'>Valide</span></td>";
            else echo "<td class='col-sm-2'><span class='label label-danger'>En attente de validation</span></td>";
            
            echo "<td class='col-sm-3'>
                <div class='btn-group'>
                    <a href='etudiant_edit.php?nom=".$row["identifiant"]."'>
                        <button type='button' class='btn btn-default'>
                            <span class='glyphicon glyphicon-edit'></span> 
                            Modifier
                        </button>
                    </a>";
            //Affichage des boutons de validation
            if($row["valide"] == "1") echo "<button type='button' class='btn btn-default'><span class='glyphicon glyphicon-remove-circle'></span> Invalider</button>";
            else echo "<button type='button' class='btn btn-default'><span class='glyphicon glyphicon-check'></span> Valider</button>";
            echo "</div>
                </td>
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
                        <button class='btn btn-success'><span class='glyphicon glyphicon-check'></span> Valider</button>
                        <a href='etudiant_edit.php?nom=".$row["identifiant"]."' class='btn btn-default'>Consulter</a>
                    </td>
                </tr>";
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
        header('Location:etudiant_liste.php?annee='.$annee.'');
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