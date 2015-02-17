<?php

function rechercherMateriel($data) {
    global $conn;
    $sql = "SELECT * FROM `materiel` WHERE MATCH (nom) AGAINST ('$data')";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        return $result;
    } else {
        echo "0 results";
    }
}


function rechercherSet($data) {
    global $conn;
    $sql = "SELECT * FROM `set` WHERE MATCH (nom) AGAINST ('$data')";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        return $result;
    } else {
        echo "0 results";
    }
}


function rechercherEtudiant($data) {
    global $conn;
    $sql = "SELECT * FROM `etudiant` WHERE MATCH (nom) AGAINST ('$data')";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        return $result;
    } else {
        echo "0 results";
    }
}
?>