<?php
require_once 'settings/db_connect.php';
require_once 'functions/etudiants.php';
require_once 'functions/f_reservations.php';

function getWaitingReservation(){
    global $conn;
    $sql = "SELECT COUNT(*) FROM emprunt WHERE etat_emprunt_id=1";
    $result = mysqli_query($conn, $sql);
    return $result;
}

function compterdv(){
	global $conn;
	$date = (string)(new DateTime('today'))->format('Y-m-d').' 00:00:00';
	$dateTomorrow = (string)(new DateTime('tomorrow'))->format('Y-m-d').' 00:00:00';
	$result = mysqli_query($conn, "SELECT COUNT(*) FROM emprunt WHERE (date_debut > '$date' AND date_debut < '$dateTomorrow') OR (date_fin > '$date' AND date_fin < '$dateTomorrow') AND etat_emprunt_id >='2' AND etat_emprunt_id<='4'");
	return $result;
}

$dataGWR = mysqli_fetch_assoc(getWaitingReservation());
$reservationsEnAttente = $dataGWR['COUNT(*)'];
$dataRDV = mysqli_fetch_assoc(compterdv());
$rendezvous = $dataRDV['COUNT(*)'];
?>


<div class="col-sm-2 col-md-2 sidebar">
	<ul class="nav nav-sidebar">
	<li><a href="dashboard.php" class="main-option"><span class="glyphicon glyphicon-dashboard"></span> Panneau principal</a></li>
		<li><a href="meetings.php" class="main-option"><span class="glyphicon glyphicon-time"></span> Rendez-vous du jour <span class="badge"><?php echo $rendezvous;?></span></a></li>
		<li><a href="planning.php" class="main-option"><span class="glyphicon glyphicon-calendar"></span> Planning</a></li>
		<li><a href="#" class="main-option"><span class="glyphicon glyphicon-eye-open"></span> Réservations <span class="badge"><?php echo $reservationsEnAttente;?></span></a>
			<ul class="nav-list">
				<li><a href="reservations.php?id=1">A venir</a></li>
				<li><a href="reservations.php?id=2">En cours</a></li>
				<li><a href="reservations.php?id=3">Terminées</a></li>
			</ul>
		</li>
		<li><a href="materiel_liste.php" class="main-option"><span class="glyphicon glyphicon-list-alt"></span> Inventaire</a></li>
		<li><a href="#" class="main-option toggleable" data-collapse="accordion"><span class="glyphicon glyphicon-education"></span> Gestion des étudiants</a><?php afficherPromotion(); ?></li>
		<li><a href="general-admin.php" class="main-option"><span class="glyphicon glyphicon-wrench"></span> Administration Générale</a></li>
		<!--<li><a href="#" class="main-option"><span class="glyphicon glyphicon-envelope"></span> Rapporter un bug</a></li>-->
		<li><a href="user_profile.php" class="main-option"><span class="glyphicon glyphicon-user"></span> Mon compte</a></li>
		<li><a href="logout.php" class="main-option"><span class="glyphicon glyphicon-off"></span> Déconnexion</a></li>
	</ul>  
</div>

<script src="js/jquery-1.11.2.min.js"></script>
<script src="js/jquery.collapse.js"></script>
<script>
	new jQueryCollapse($(".toggleable"),{query: 'li'});
</script>