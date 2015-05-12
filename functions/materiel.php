<?php

/* AJOUT D'UN MATERIEL */
if(isset($_POST['addMateriel'])){
    ajouterMateriel();
}

function ajouterMateriel() {
    global $conn;
    $nom = $_POST['nom'];
    $reference = $_POST['reference'];
    $num_cn = $_POST['num_cn'];
    $num_prop = $_POST['num_prop'];
    $description = $_POST['description'];
    $note = $_POST['note'];
    $etat = $_POST['etat'];
    $set = $_POST['set'];
    $categorie = $_POST['categorie'];
    $dispo = $_POST['dispo'];
    
    $sql = "INSERT INTO materiel (nom, reference, fiche_technique, numero_cn, numero_proprietaire, description, note, set_id, etat_id, categorie_id, disponibilite_id) VALUES ('$nom', '$reference', '', '$num_cn', '$num_prop', '$description', '$note', '$set', '$etat', '$categorie', '$dispo')";
    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
        $sql2 = "SELECT id FROM materiel WHERE nom = '$nom'";
        echo $nom;
       $result2 = mysqli_query($conn, $sql2);

        if (mysqli_num_rows($result2) > 0) {
            $id = mysqli_fetch_assoc($result2)['id'];
			header('Location: materiel_liste.php');
        } else {
            echo "0 results";
        } 
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}


/* MODIFICATION D'UN MATERIEL */
if(isset($_POST['updateMateriel'])){
    editMateriel();
}

function editMateriel() {
    global $conn;
    /*$prenom = $_POST['prenom'];*/
    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $reference = $_POST['reference'];
    $num_cn = $_POST['num_cn'];
    $num_prop = $_POST['num_prop'];
    $description = $_POST['description'];
    $note = $_POST['note'];
    $set_id = $_POST['set'];
    $etat = $_POST['etat'];
    $categorie = $_POST['categorie'];
    $dispo = $_POST['dispo'];
    $sql = "UPDATE materiel SET nom = '$nom', reference = '$reference', numero_cn = '$num_cn', numero_proprietaire = '$num_prop', description = '$description', note = '$note', etat_id = '$etat', set_id = '$set_id', categorie_id = '$categorie', disponibilite_id = '$dispo' WHERE id = $id";
    if (mysqli_query($conn, $sql)) {
        echo "Updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}


/* SELECTION DE TOUS LES MATERIELS */
function getMateriel() {
    global $conn;
    $sql = "SELECT id, nom, reference, numero_cn, etat_id, set_id, categorie_id, disponibilite_id, note FROM materiel";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        return $result;
    } else {
        echo "0 results";
    } 
}


/* SELECTION DE TOUS LES MATERIELS D'UN SET */
function getSetMateriel($set_id) {
    global $conn;
    $sql = "SELECT id, nom, reference, numero_cn, etat_id, disponibilite_id, note FROM materiel WHERE set_id = $set_id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        return $result;
    } else {
        echo "0 results";
    } 
}


/* SELECTION D'UN SEUL MATERIEL */
function fetchMateriel($id) {
    global $conn;
    $sql = "SELECT id, nom, reference, fiche_technique, numero_cn, numero_proprietaire, description, note, etat_id, disponibilite_id, set_id, categorie_id FROM materiel WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($result) > 0) {
        return $result;
    } else {
        echo "0 results";
    }
}

/* SELECTION DE L'IMAGE D'UN MATERIEL */
function fetchImage($id) {
    global $conn;
    $sql = "SELECT adresse FROM images WHERE materiel_id = $id";
    $result = mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($result) > 0) {
        return $result;
    } else {
        echo "0 results";
    }
}

if(isset($_POST['removeSetMateriel'])){
    retirerSetMateriel();
}

/* RETIRER UN MATERIEL D'UN SET */
function retirerSetMateriel() {
    global $conn;
    $id = $_POST['id'];
    $sql = "UPDATE materiel SET set_id = '0' WHERE id = $id";
    mysqli_query($conn, $sql);
}


/* AJOUTER UN MATERIEL A UN SET */
if(isset($_POST['addSetMateriel'])) {
    ajouterSetMateriel();
}

function ajouterSetMateriel() {
    global $conn;
    $id = $_POST['id'];
    $nom = $_POST['recherche'];
    $sql = "UPDATE materiel SET set_id = '$id' WHERE id = '$nom'";
    mysqli_query($conn, $sql);
}

/* SUPPRIMER UN MATERIEL */
if(isset($_POST['deleteMateriel'])){
    supprimerMateriel();
}

function supprimerMateriel() {
    global $conn;
    $id = $_POST['id'];

    if (mysqli_query($conn, "DELETE FROM materiel WHERE id=$id")) {
        echo "Matériel supprimé";
    } else {
        echo "Erreur à la suppression : " . mysqli_error($conn);
    }
}

?>