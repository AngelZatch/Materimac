<?php
    session_start();
    require_once 'settings/db_connect.php';

    echo "coucou";

    if(isset($_SESSION['id']) {
        $insert = $conn->prepare('
            INSERT INTO panier (id_etudiant, id_materiel) VALUES (:user, :id)
        ');
        $insert->execute(array(
            'id' => $_POST['id'],
            'user' => '103832'		
        ));
    }
?>