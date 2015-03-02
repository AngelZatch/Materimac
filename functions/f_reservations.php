<?php

function menuReservation(){
    global $conn;
    $sql = "SELECT * FROM etat_emprunt";
    $result = mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            echo "<li><a href='reservations.php?id=".$row['id']."'>".$row['nom']."</a></li>";
        }
    }
}

function afficherReservation($data){
    global $conn;
    $sql = "SELECT * FROM emprunt WHERE etat_emprunt_id='.$data.'";
    $result = mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($result) > 0){
        echo "<tbody>";
        while($row = mysqli_fetch_assoc($result)){
            //Get etudiant
            $sql_etudiant = "SELECT nom, prenom FROM etudiant WHERE numero_etudiant='$row[etudiant_id]'";
            $result_etudiant = mysqli_query($conn, $sql_etudiant);
            $row_etudiant = mysqli_fetch_assoc($result_etudiant);
            echo "<tr>
                        <td class='col-sm-2'>".$row['date_debut']."</td>
                        <td class='col-sm-2'>".$row_etudiant['prenom']." ".$row_etudiant['nom']."</td>
                        <td class='col-sm-1'>".$row['reference']."</td>
                        <td class='col-sm-1'>".$row['raison']."</td>
                        <td class='col-sm-2'>".$row['date_debut']."</td>
                        <td class='col-sm-2'>".$row['date_fin']."</td>
                        <td class='col-sm-2'>
                            <div class='btn-group'>
                                <button class='btn btn-default'>Valider</button>
                                <button class='btn btn-default'>Refuser</button>
                            </div>
                        </td>
                    </tr>
                <div>
                    Liste du Matériel : <br>";
            
            //Get liste matériel
            $sql_listeMateriel = "SELECT * FROM detail_emprunt JOIN materiel ON (materiel_id=materiel.id) WHERE reference_id='$row[reference]'";
            $result_contenu = mysqli_query($conn, $sql_listeMateriel);
                while($row_listeMateriel = mysqli_fetch_assoc($result_contenu)){
                    echo $row_listeMateriel['nom']."<br>";   
                }
                echo "</div>";
        }
        echo "<tbody>";
    }
}

?>