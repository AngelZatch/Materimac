<?php
require_once 'settings/connection.php';
require_once 'functions/etudiants.php';
require_once 'functions/f_reservations.php';

function getWaitingReservation(){
    global $conn;
    $sql = "SELECT COUNT(*) FROM emprunt WHERE etat_emprunt_id=1";
    $result = mysqli_query($conn, $sql);
    return $result;
}

$dataGWR = mysqli_fetch_assoc(getWaitingReservation());
$reservationsEnAttente = $dataGWR['COUNT(*)'];
?>


<div class="col-sm-3 col-md-2 sidebar">
 <ul class="nav nav-sidebar">
     <li>
         <a href="meetings.php" class="main-option">Rendez-vous du jour <span class="badge">3</span></a>
     </li>
     <li>
         <a class="main-option" href>Planning</a>
     </li>
     <li>
        <a class="main-option">Réservations <span class="badge"><?php echo $reservationsEnAttente;?></span></a>
        <ul>
            <li><a href="reservations.php?id=1">A venir</a></li>
            <li><a href="reservations.php?id=2">En cours</a></li>
            <li><a href="reservations.php?id=3">Terminées</a></li>
        </ul>
     </li>
     <li><a href="materiel_liste.php" class="main-option">Inventaire</a>
         <!--<ul>
             <li><a href="materiel_ajout.php">Ajout de matériel</a></li>
             <li><a href="set_ajout.php">Ajout de set</a></li>
         </ul>-->
     </li>
     <li><a class="main-option">Gestion des étudiants</a>
         <?php afficherPromotion(); ?>
     </li>
     <!--<li><a href>Gestion des projets</a>
        <ul>
             <li>Liste des Enseignants</li>
             <li>Ajout des Projets</li>
        </ul>
     </li>-->
     <li><a href="general-admin.php" class="main-option">Administration Générale</a></li>
 </ul>  
</div>