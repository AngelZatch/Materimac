<?php
require_once 'settings/connection.php';
require_once 'functions/etudiants.php';

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
         <a href="meetings.php">Rendez-vous du jour <span class="badge">3</span></a>
     </li>
     <li>
         <a href>Planning</a>
     </li>
     <li>
        <a href>Réservations <span class="badge">4</span></a>
        <ul>
             <li>En attente</li>
             <li>Validées</li>
             <li>En cours</li>
             <li>En retard</li>
             <li>Passées</li>
             <li>Annulées</li>
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