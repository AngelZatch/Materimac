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
            echo "<tr>
                    <td class='col-sm-2'>".$row['date_debut']."</td>
                    <td class='col-sm-2'>".$row['etudiant_id']."</td>
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
                </tr>";
        }
        echo "<tbody>";
    }
}

?>