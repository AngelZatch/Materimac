<?php

function labelDispo($data){
    if($data == 'Disponible') echo '<span class="label label-success">Disponible</span>';
    if($data == 'Prévu') echo '<span class="label label-warning">Prévu aujourd\'hui</span>';
    if($data == 'Indisponible') echo '<span class="label label-danger">Indisponible</span>';
    if($data == 'Gelé') echo '<span class="label label-info">Gelé</span>';
}

function labelDispoEtudiant($data){
    if($data == 'Disponible' || $data == 'Prévu') echo '<span class="label label-success label-etudiant">Disponible</span>';
    if($data == 'Indisponible' || $data == 'Gelé') echo '<span class="label label-danger label-etudiant">Indisponible</span>';
}
?>