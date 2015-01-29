<?php

/* SELECTION DE TOUTES LES DISPONIBILITES */
function getDispo() {
    global $conn;
    $sql = "SELECT id, nom FROM disponibilite_materiel";
    $result = mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($result) > 0) {
        return $result;
    } else {
        echo "0 results";
    }
}


/* SELECTION D'UNE SEULE DISPONIBILITE */
function fetchDispo($id) {
    global $conn;
    $sql = "SELECT id, nom FROM disponibilite_materiel WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($result) > 0) {
        return $result;
    } else {
        echo "0 results";
    }
}


/* SELECTION DE TOUS LES ETATS */
function getEtat() {
    global $conn;
    $sql = "SELECT id, nom FROM etat_materiel";
    $result = mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($result) > 0) {
        return $result;
    } else {
        echo "0 results";
    }
}


/* SELECTION D'UN SEUL ETAT */
function fetchEtat($id) {
    global $conn;
    $sql = "SELECT id, nom FROM etat_materiel WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($result) > 0) {
        return $result;
    } else {
        echo "0 results";
    }
}


?>