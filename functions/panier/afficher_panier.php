<?php
    session_start();
    require_once '../../settings/db_connect.php';
    include '../materiel.php';
    include '../set.php';
    global $conn;
    $id_etudiant = $_SESSION['id'];

    // On récupère les items associé à l'id étudiant
    $sql = "SELECT id_materiel FROM panier WHERE id_etudiant = '$id_etudiant' AND  id_set = '0'";
    $materiels = mysqli_query($conn, $sql);
    
    $sql2 = "SELECT id_set FROM panier WHERE id_etudiant = '$id_etudiant' AND  id_materiel = '0'";
    $sets = mysqli_query($conn, $sql2);

    $count = mysqli_num_rows($materiels) + mysqli_num_rows($sets);
    $json['nbItem'] = $count;

    $i = 0; $j = 0;

    while($set = mysqli_fetch_assoc($sets)) {
        $id = $set['id_set'];
        $nom = mysqli_fetch_assoc(fetchSet($id))['nom'];
        $json['set'][$j]['nom'] = $nom;
        $json['set'][$j]['id'] = $id;
        $j++;
    }

    while($materiel = mysqli_fetch_assoc($materiels)) {
        $id = $materiel['id_materiel'];
        $nom = mysqli_fetch_assoc(fetchMateriel($id))['nom'];
        $json['materiel'][$i]['nom'] = $nom;
        $json['materiel'][$i]['id'] = $id;
        $i++;
    }

    echo json_encode($json);

?>