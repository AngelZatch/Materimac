<?php
function construct($data){
	global $conn;
	$result = mysqli_query($conn, "SELECT * FROM disponibilite_gestionnaire WHERE gestionnaire_id = $data");
	
	//CONSTRUCTION DES HORAIRES
		if(mysqli_num_rows($result) > 0){
		echo "<table class='table table-bordered'><tbody>";
		while($row = mysqli_fetch_assoc($result)){
			echo "<tr><td>".$row['heure']."</td></tr>";
		}
		echo "<tr><td><div class='btn-group'><button class='btn btn-default'><span class='glyphicon glyphicon-edit'></span></button><button class='btn btn-default'><span class='glyphicon glyphicon-plus'></span></button></div></td></tr></tbody></table></div>";
	}
	
	// CONSTRUCTION DES JOURS
	$numHours = mysqli_num_rows($result);
	$maxDays = 5;
	$dayOffset = 0;
	$cumulatedOffset = 0;
	$fridayOffset = true;
	
	for($i = 0; $i < $maxDays; $i++){
		echo "<div class='panel panel-default col-sm-2'><div class='panel-heading'>";
		/* On déclare la variable de jour*/
		$caseDate = new DateTime('today');
		
		/* On récupère la valeur de la case précédente */
		$caseDateString = (string)$caseDate->add(new DateInterval("P".$cumulatedOffset."D"))->format('l');
		
		/*On compare la valeur de la case aux jours à ne pas afficher*/
		switch($caseDateString){
			case "Friday" :
				if($i != 0) $dayOffset += 3;
				$cumulatedOffset = $dayOffset;
				break;
			
			case "Saturday":
				if(!$fridayOffset || $i == 0) $dayOffset += 2;
				else $dayOffset += 3;
				$cumulatedOffset = $dayOffset;
				break;

			case "Sunday":
				if(!$fridayOffset || $i == 0) {
					$dayOffset += 1;
					$cumulatedOffset = $dayOffset;
				}
				else {
					$dayOffset += 2;
					$cumulatedOffset += $dayOffset;	
				}
				
				break;

			default:
				if($i == 0) $dayOffset += 0;
				else $dayOffset += 1;
				$cumulatedOffset += $dayOffset;
				break;
		}
		
		/*On affiche ensuite la nouvelle valeur de la journée*/
		echo $caseDate->add(new DateInterval("P".$dayOffset."D"))->format('l d');
		
		/*On reset l'offset "local"*/
		$dayOffset = 0;
		
		echo "</div>
		<table class='table table-bordered'>
		<tbody>";
		for($j = 0; $j < $numHours; $j++){
			echo "<tr><td></td></tr>";
		}
		echo "</tbody></table></div>";
	}
	
}

//echo ;
?>