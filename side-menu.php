<?php
require_once 'settings/connection.php';

function getNotValidNumber(){
    global $conn;
    $sql = "SELECT COUNT(*) FROM etudiant WHERE valide=0";
    $result = mysqli_query($conn, $sql);
    return $result;
}

$dataGNVN = mysqli_fetch_assoc(getNotValidNumber());
$etudiantsNonVerifies = $dataGNVN['COUNT(*)'];
?>


<div class="col-sm-3 col-md-2 sidebar">
 <ul class="nav nav-sidebar">
     <li>
         <a href>Rendez-vous du jour <span class="badge">3</span></a>
     </li>
     <li>
         <a href>Planning</a>
     </li>
 </ul>  
 <ul class="nav nav-sidebar">
     <li>
         <a href>Réservations <span class="badge">4</span></a>
     </li>
 </ul>  
 <ul class="nav nav-sidebar">
     <li><a href>Inventaire</a></li>
 </ul>
 <ul class="nav nav-sidebar">
     <li><a href="liste_etudiants.php">Gestion des étudiants <span class="badge"><?php echo $etudiantsNonVerifies;?></span></a></li>
 </ul>
 <ul class="nav nav-sidebar">
     <li><a href>Gestion des projets</a></li>
 </ul>
 <ul class="nav nav-sidebar">
     <li><a href>Administration Générale</a></li>
 </ul>  
</div>