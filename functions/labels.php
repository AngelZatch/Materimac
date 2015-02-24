<?php

function labelDispo($data){
    if($data == 'Disponible') echo '<span class="label label-success">Disponible</span>';
    if($data == 'Prévu') echo '<span class="label label-warning">Prévu aujourd\'hui</span>';
    if($data == 'Indisponible') echo '<span class="label label-danger">Indisponible</span>';
    if($data == 'Gelé') echo '<span class="label label-info">Gelé</span>';
}
?>