<?php
function getHours($data){
	global $conn;
	$result = mysqli_query($conn, "SELECT * FROM disponibilite_gestionnaire WHERE gestionnaire_id = $data");
	if(mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_assoc($result)){
			echo "<tr><td>".$row['heure']."</td></tr>";
		}
	}
	return mysqli_num_rows($result);
}
?>