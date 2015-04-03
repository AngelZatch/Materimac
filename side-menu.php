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
		<li><a href="meetings.php" class="main-option" data-collapse="accordion">Rendez-vous du jour <span class="badge">3</span></a></li>
		<li><a href="planning.php" class="main-option" data-collapse="accordion">Planning</a></li>
		<li data-collapse-summary><a class="main-option toggleable" data-collapse="accordion">Réservations <span class="badge"><?php echo $reservationsEnAttente;?></span></a>
			<ul class="nav-list">
				<li><a href="reservations.php?id=1">A venir</a></li>
				<li><a href="reservations.php?id=2">En cours</a></li>
				<li><a href="reservations.php?id=3">Terminées</a></li>
			</ul>
		</li>
		<li><a href="materiel_liste.php" class="main-option" data-collapse="accordion">Inventaire</a></li>
		<li data-collapse-summary><a class="main-option toggleable" data-collapse="accordion">Gestion des étudiants</a><?php afficherPromotion(); ?></li>
		<li><a href="general-admin.php" class="main-option" data-collapse="accordion">Administration Générale</a></li>
	</ul>  
</div>

<script src="js/jquery-1.11.2.min.js"></script>
<script src="js/jquery.collapse.js"></script>
<script>
new jQueryCollapse($(".toggleable"),{query: 'a'});
</script>