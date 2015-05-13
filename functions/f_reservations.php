<?php

require_once 'functions/materiel.php';
require_once 'functions/set.php';

if(isset($_POST['validerResa'])){
	validerResa($_POST["id"]);
}
if(isset($_POST['annulerResa'])){
	annulerResa($_POST["id"]);
}

if(isset($_POST['sortirResa'])){
	sortirResa($_POST["reference_reservation"]);
}

if(isset($_POST['entrerResa'])){
	entrerResa($_POST["reference_reservation"]);
}

function validerResa($data){
	global $conn;
	$sql = "UPDATE emprunt SET etat_emprunt_id='2' WHERE reference='$data'";
	mysqli_query($conn, $sql);
}

function annulerResa($data){
	global $conn;
	$sql = "UPDATE emprunt SET etat_emprunt_id='6' WHERE reference='$data'";
	mysqli_query($conn, $sql);
}

function sortirResa($data){
	global $conn;
	$sql = "UPDATE emprunt SET etat_emprunt_id='3' WHERE reference='$data'";
	mysqli_query($conn, $sql);
	/* On met tous le matériel sorti en indisponible */
	$fetchListItems = mysqli_query($conn, "SELECT materiel_id FROM detail_emprunt WHERE reference_id=$data");
	while($listItems = mysqli_fetch_assoc($fetchListItems)){
		mysqli_query($conn, "UPDATE materiel SET disponibilite_id='3' WHERE id='$listItems[materiel_id]'");
	}
}

function entrerResa($data){
	global $conn;
	$sql = "UPDATE emprunt SET etat_emprunt_id='5' WHERE reference='$data'";
	mysqli_query($conn, $sql);
	$fetchListItems = mysqli_query($conn, "SELECT materiel_id FROM detail_emprunt WHERE reference_id=$data");
	while($listItems = mysqli_fetch_assoc($fetchListItems)){
		mysqli_query($conn, "UPDATE materiel SET disponibilite_id='1' WHERE id='$listItems[materiel_id]'");
	}
}

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

function afficherRDV(){
	global $conn;
	$date = (string)(new DateTime('today'))->format('Y-m-d').' 00:00:00';
	$dateTomorrow = (string)(new DateTime('tomorrow'))->format('Y-m-d').' 00:00:00';
	$result = mysqli_query($conn, "SELECT reference, date_debut, date_fin, etudiant_id, etat_emprunt_id FROM emprunt WHERE (date_debut >= '$date' AND date_debut <= '$dateTomorrow') OR (date_fin >= '$date' AND date_fin <= '$dateTomorrow') AND etat_emprunt_id >='2' AND etat_emprunt_id<='4'");
	if(mysqli_num_rows($result) > 0){
		echo "<table class='table table-striped table-hover'><tbody class='table table-striped'>";
		while($row = mysqli_fetch_assoc($result)){
			if($row['etat_emprunt_id'] == '2') {
				$daterdv = date_create($row['date_debut']);
				$formatrdv = date_format($daterdv, 'H:i:s');
			} else {
				$daterdv = date_create($row['date_fin']);
				$formatrdv = date_format($daterdv, 'H:i:s');
			}
			echo "<tr><td>Réservation ".$row['reference']." à ".$formatrdv." avec ".$row['etudiant_id']."</td></tr>";
		}
		echo "</tbody></table>";
	} else {
		echo "<p>Aucun rendez-vous aujourd'hui</p>";
	}
}

function afficherEmpruntsProches(){
	global $conn;
	$date = (string)(new DateTime('today'))->format('Y-m-d').' 00:00:00';
	$dateTomorrow = (string)(new DateTime('tomorrow'))->format('Y-m-d').' 00:00:00';
	$result = mysqli_query($conn, "SELECT * FROM emprunt WHERE ((date_debut > '$date' AND date_debut < '$dateTomorrow') OR (date_fin >= '$date' AND date_fin <= '$dateTomorrow') AND etat_emprunt_id >='2' AND etat_emprunt_id<='4') OR (date_fin <= '$date' AND etat_emprunt_id='4')");
	if(mysqli_num_rows($result) > 0){
		echo "<h2>Réservations du jour : ".mysqli_num_rows($result)."</h2>";
		while($row = mysqli_fetch_assoc($result)){
			echo "<div class='panel ";
			if($row['etat_emprunt_id'] == "2") {echo "panel-success'>";} 
			if($row['etat_emprunt_id'] == "3") {echo "panel-default'>";}
			if($row['etat_emprunt_id'] == "4") {echo "panel-danger'>";}
			$dateSub = date_format(date_create($row['date_debut']), 'd/m/Y');
			$dateDebut = date_format(date_create($row['date_debut']), 'd/m/Y H:i:s');
			$dateFin = date_format(date_create($row['date_fin']), 'd/m/Y H:i:s');
			$etudiant = mysqli_fetch_assoc(mysqli_query($conn, "SELECT prenom, nom FROM etudiant WHERE identifiant='$row[etudiant_id]'"));
			echo "<div class='panel-heading'>
					<div class='container-fluid'><div class='row'>
                    <table class='col-md-12'>
                        <tr>
							<td class='col-md-4'>Réservation n°<span class='emphasis-text'>".$row['reference']."</span><br>Soumise le <span class='emphasis-text'>".$dateSub."</span></td>
                            <td class='col-md-3'>Par <span class='emphasis-text'>".$etudiant['prenom']." ".$etudiant['nom']."</span></td>
                            <td class='col-md-3'>Du <span class='emphasis-text'>".$dateDebut."</span><br>Au <span class='emphasis-text'>".$dateFin."</span></td>
                        </tr>
                        </table>
                    </div></div></div>";
                    
            //CONTENU DE LA RESERVATION
            echo "<div class='panel-body'>
                    <div class='container-fluid'>
                        <div class='row'>
                            <div class='col-md-12'>";
            
            // Liste du matériel
            echo "<h4>Liste du matériel</h4>";
			echo "<table class='table table-striped table-hover'>   
					<thead>
						<tr>
							<th class='col-sm-2'>Nom Produit</th>
							<th class='col-sm-3'>Référence</th>
							<th class='col-sm-1'>n°CN</th>
							<th class='col-sm-2'>Notes</th>
							<th class='col-sm-2'>Actions</th>
						</tr>
					</thead>

					<tbody class='table table-striped'>";
            /*$result_contenu = mysqli_query($conn, "SELECT * FROM detail_emprunt JOIN materiel ON (materiel_id=materiel.id) WHERE reference='$row[reference]'");
            while($row_listeMateriel = mysqli_fetch_assoc($result_contenu)){
                echo "<tr>
						<td class='col-sm-2'>".$row_listeMateriel['nom']."</td>
						<td class='col-sm-3'>".$row_listeMateriel['reference']."</td>
						<td class='col-sm-1'>".$row_listeMateriel['numero_cn']."</td>
						<td class='col-sm-2'>".$row_listeMateriel['note']."</td>
						<td class='col-sm-2'>";
				if($row['etat_emprunt_id'] == '2') {echo "<button class='btn btn-primary'>Sortir de l'inventaire</button></td>";}
				else {echo "<button class='btn btn-primary'>Entrer dans l'inventaire</button></td>";};
					echo "</tr>";   
            }*/
            $result_contenu = mysqli_query($conn, "SELECT * FROM detail_emprunt WHERE reference='$row[reference]'");
            while($row_listeMateriel = mysqli_fetch_assoc($result_contenu)){
                if(!empty($row_listeMateriel['materiel_id'])) {
                    $materiel = mysqli_fetch_assoc(fetchMateriel($row_listeMateriel['materiel_id']));
                    echo "<tr>
                            <td class='col-sm-2'>".$materiel['nom']."</td>
                            <td class='col-sm-3'>".$materiel['reference']."</td>
                            <td class='col-sm-1'>".$materiel['numero_cn']."</td>
                            <td class='col-sm-2'>".$materiel['note']."</td>
                            <td class='col-sm-2'>";
                    if($row['etat_emprunt_id'] == '2') {echo "<button class='btn btn-primary'>Sortir de l'inventaire</button></td>";}
                    else {echo "<button class='btn btn-primary'>Entrer dans l'inventaire</button></td>";};
                        echo "</tr>";
                }
                if(!empty($row_listeMateriel['set_id'])) {
                    $set = fetchMateriel($row_listeMateriel['set_id']);
                    echo "<tr>
                            <td class='col-sm-2'>".$set['nom']."</td>
                            <td class='col-sm-2'>";
                    if($row['etat_emprunt_id'] == '2') {echo "<button class='btn btn-primary'>Sortir de l'inventaire</button></td>";}
                    else {echo "<button class='btn btn-primary'>Entrer dans l'inventaire</button></td>";};
                        echo "</tr>";
                }
            }
			echo "</tbody></table></div>";
            
            // Liste des étudiants
            echo "<div class='col-md-4'>
                    <h4>Liste des étudiants</h4>";
            $result_etudiant = mysqli_query($conn, "SELECT * FROM groupe_etudiant WHERE reference='$row[reference]'");
            while($row_listeEtudiant = mysqli_fetch_assoc($result_etudiant)) {
                if(!empty($row_listeEtudiant['etudiant_id'])){
                /***** à décommenter quand l'ajout d'étudiant au projet sera fait par fonction de recherche
                    $etudiant = mysqli_fetch_assoc(fetchEtudiant($row_listeEtudiant['etudiant_id']));
                    echo "<li><a href=etudiant_edit.php?nom=".$etudiant['identifiant'].">".$etudiant['prenom']." ".$etudiant['nom']."</a></li>";
                *****/
                     echo "<li>".$row_listeEtudiant['etudiant_id']."</li>";
                }
            }
            echo "</div>";
            
            // Motif de l'emprunt & Enseignant
            echo "<div class='col-md-4'>
                        <h4>Raison de l'emprunt</h4>";
            echo "<p>".$row['raison']."</p>";
            echo "<h4>Enseignant</h4>";
            if(!empty($row['enseignant'])) {
                echo "<p>".$row['raison']."</p>";
            } else echo "Pas d'enseignant renseigné.</div>";
            echo "</div></div>";
			echo "<div class='col-md-12'>
					<form action='local_dashboard.php' method='post'>";
			if($row['etat_emprunt_id'] == '2') echo "<button type='submit' class='btn btn-custom btn-custom-validate confirmAdd' name='sortirResa'><span class='glyphicon glyphicon-ok'></span>  Valider la sortie d'inventaire</button>";
			else echo "<button type='submit' class='btn btn-custom btn-custom-validate confirmAdd' name='entrerResa'><span class='glyphicon glyphicon-ok'></span>  Valider la rentrée en inventaire</button>";
			echo "<input type='hidden' name='reference_reservation' value=".$row['reference']."></form>";
            echo "</div></div></div></div></div>";
		}
	} else {
		echo "<h2>Aucune réservation ce jour</h2>";
	}
}

function afficherReservation($data){
    global $conn;
    switch($data){
        case 1:
            $sql = "SELECT * FROM emprunt WHERE etat_emprunt_id='1' OR etat_emprunt_id='2'";
            break;
        
        case 2:
            $sql = "SELECT * FROM emprunt WHERE etat_emprunt_id='3' OR etat_emprunt_id='4'";
            break;
        
        case 3:
            $sql = "SELECT * FROM emprunt WHERE etat_emprunt_id='5' OR etat_emprunt_id='6'";
            break;
		
		case 4:
            $sql = "SELECT * FROM emprunt WHERE etat_emprunt_id='1'";
            break;
		
		case 5:
            $sql = "SELECT * FROM emprunt WHERE etat_emprunt_id='4'";
            break;
        
        default:
            break;
    }
    $result = mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            //Get etudiant
            $result_etudiant = mysqli_query($conn, "SELECT nom, prenom FROM etudiant WHERE identifiant='$row[etudiant_id]'");
            $row_etudiant = mysqli_fetch_assoc($result_etudiant);
            
            switch($row['etat_emprunt_id']){
                case 1:
                    echo "<div class='panel panel-info'>";
                    break;
                
                case 2:
                    echo "<div class='panel panel-success'>";
                    break;
                
                case 3:
                    echo "<div class='panel panel-default'>";
                    break;
                
                case 4:
                    echo "<div class='panel panel-danger'>";
                    break;
                
                case 5:
                    echo "<div class='panel panel-default'>";
                    break;
                
                case 6:
                    echo "<div class='panel panel-default'>";
                    break;
                
                default:
                    break;
            }
			
			$dateSub = date_format(date_create($row['date_debut']), 'd/m/Y');
			$dateDebut = date_format(date_create($row['date_debut']), 'd/m/Y H:i:s');
			$dateFin = date_format(date_create($row['date_fin']), 'd/m/Y H:i:s');
            
            echo "<div class='panel-heading'>
			<div class='container-fluid'><div class='row'>
                    <table class='col-md-12'>
                        <tr>
							<td class='col-md-4'>Réservation n°<span class='emphasis-text'>".$row['reference']."</span><br>Soumise le <span class='emphasis-text'>".$dateSub."</span></td>
                            <td class='col-md-3'>Par <span class='emphasis-text'>".$row_etudiant['prenom']." ".$row_etudiant['nom']."</span></td>
                            <td class='col-md-3'>Du <span class='emphasis-text'>".$dateDebut."</span><br>Au <span class='emphasis-text'>".$dateFin."</span></td>
                            <td class='col-md-2'>";
            if($row['etat_emprunt_id'] < 3){
            echo "<form action=".$_SERVER['PHP_SELF']."?id=$data method='post'><div class='form-group'><div class='btn-group'>";
                    if($row['etat_emprunt_id'] == 1) echo"<button type='submit' class='btn btn-default' name='validerResa'><span class='glyphicon glyphicon-ok'></span> Valider</button>";
                    echo "<button type='submit' class='btn btn-default' name='annulerResa'><span class='glyphicon glyphicon-remove'></span> Refuser</button>
					<input type='hidden' name='id' value=".$row['reference'].">
                </div></div></form>";
            }
            echo "</td>
                        </tr>
                        </table>
                    </div></div></div>
                    <div class='panel-body'>";
            
            //CONTENU DE LA RESERVATION
            echo "<div class='container-fluid'>
                    <div class='row'>
                        <div class='col-md-4'>";
            
            // Liste du matériel
            echo "<h4>Liste du matériel</h4>";
            /*$result_contenu = mysqli_query($conn, "SELECT * FROM detail_emprunt JOIN materiel ON (materiel_id=materiel.id) WHERE reference='$row[reference]'");
            while($row_listeMateriel = mysqli_fetch_assoc($result_contenu)){
                echo "<li><a href=materiel_edit.php?id=".$row_listeMateriel['id'].">".$row_listeMateriel['nom']."</a></li>";   
            }*/
            $result_contenu = mysqli_query($conn, "SELECT * FROM detail_emprunt WHERE reference='$row[reference]'");
            while($row_listeMateriel = mysqli_fetch_assoc($result_contenu)){
                if(!empty($row_listeMateriel['materiel_id'])) {
                    $materiel = mysqli_fetch_assoc(fetchMateriel($row_listeMateriel['materiel_id']));
                    echo "<li><a href=materiel_edit.php?id=".$materiel['id'].">".$materiel['nom']."</a></li>";
                }
                if(!empty($row_listeMateriel['set_id'])) {
                    $set = mysqli_fetch_assoc(fetchSet($row_listeMateriel['set_id']));
                    echo "<li><a href=set_edit.php?id=".$set['id'].">".$set['nom']."</a></li>";
                }
            }
            
            // Liste des étudiants
            echo "</div>
                    <div class='col-md-4'>
                    <h4>Liste des étudiants</h4>";
            $result_etudiant = mysqli_query($conn, "SELECT * FROM groupe_etudiant WHERE reference='$row[reference]'");
            while($row_listeEtudiant = mysqli_fetch_assoc($result_etudiant)) {
                if(!empty($row_listeEtudiant['etudiant_id'])){
                /***** à décommenter quand l'ajout d'étudiant au projet sera fait par fonction de recherche
                    $etudiant = mysqli_fetch_assoc(fetchEtudiant($row_listeEtudiant['etudiant_id']));
                    echo "<li><a href=etudiant_edit.php?nom=".$etudiant['identifiant'].">".$etudiant['prenom']." ".$etudiant['nom']."</a></li>";
                *****/
                     echo "<li>".$row_listeEtudiant['etudiant_id']."</li>";
                }
            }
            echo "</div>";
            
            // Motif de l'emprunt & Enseignant
            echo "<div class='col-md-4'>
                        <h4>Motif de l'emprunt</h4>";
            echo "<p>".$row['raison']."</p>";
            echo "<h4>Enseignant</h4>";
            if(!empty($row['enseignant'])) {
                echo "<p>".$row['raison']."</p>";
            } else echo "Pas d'enseignant renseigné.";
            echo "</div>
                    </div>
                </div>";
            
            echo "</div></div>";
        }
    } else {
		switch($data){
			case 1:
				echo "<p>Aucune réservation en attente</p>";
				break;

			case 2:
				echo "<p>Aucune réservation en cours</p>";
				break;

			case 3:
				echo "<p>Aucune réservation terminée</p>";
				break;

			case 4:
				echo "<p>Aucune réservation en attente</p>";
				break;
			
			case 5:
				echo "<p>Aucune réservation en retard</p>";
				break;

			default:
				break;
    	}
	}
}

?>