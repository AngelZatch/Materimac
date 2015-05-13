<?php
    session_start();
    require_once '../../settings/db_connect.php';

	if(isset[$_POST['date'])) {
		// On récupère les plages de dispo du gestionnaire
		$sql = "SELECT * FROM disponibilite_gestionnaire";
		$meetings = mysqli_query($conn,$sql);
		
		$json['coucou'] = "coucou";
		echo json_encode($json);
	}

?>