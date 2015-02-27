<?php
require_once 'settings/connection.php';
require_once 'functions/etudiants.php';
require_once 'functions/f_reservations.php';

function getNotValidNumber(){
    global $conn;
    $sql = "SELECT COUNT(*) FROM etudiant WHERE valide=0";
    $result = mysqli_query($conn, $sql);
    return $result;
}

function getWaitingReservation(){
    global $conn;
    $sql = "SELECT COUNT(*) FROM emprunt WHERE etat_emprunt_id=1";
    $result = mysqli_query($conn, $sql);
    return $result;
}

$dataGNVN = mysqli_fetch_assoc(getNotValidNumber());
$etudiantsNonVerifies = $dataGNVN['COUNT(*)'];
$dataGWR = mysqli_fetch_assoc(getWaitingReservation());
$reservationsEnAttente = $dataGWR['COUNT(*)'];
?>


<div class="col-sm-3 col-md-2 sidebar">
 <ul class="nav nav-sidebar">
     <li>
         <a href="meetings.php">Rendez-vous du jour <span class="badge">3</span></a>
     </li>
     <li>
         <a href>Planning</a>
     </li>
     <li>
        <a>Réservations <span class="badge"><?php echo $reservationsEnAttente;?></span></a>
        <ul>
            <?php menuReservation();?>
         </ul>
     </li>
     <li><a href="liste-materiel.php">Inventaire</a>
         <!--<ul>
             <li><a href="materiel_ajout.php">Ajout de matériel</a></li>
             <li><a href="set_ajout.php">Ajout de set</a></li>
         </ul>-->
     </li>
     <li><a>Gestion des étudiants <span class="badge"><?php echo $etudiantsNonVerifies;?></span></a>
         <ul>
             <li>Liste par formation
                 <?php afficherPromotion(); ?>
             </li>
             <!--<li><a href="valider_etudiant.php">Validation d'étudiants</a></li>-->
         </ul>
     </li>
     <!--<li><a href>Gestion des projets</a>
        <ul>
             <li>Liste des Enseignants</li>
             <li>Ajout des Projets</li>
        </ul>
     </li>-->
     <li><a href="general-admin.php">Administration Générale</a></li>
 </ul>  
</div>