<?php
session_start();
require_once 'settings/db_connect.php';
require_once 'functions/materiel.php';
require_once 'functions/set.php';
include 'functions/categorie.php';
include 'functions/set_mat_common.php';
include 'functions/labels.php';

$data = $_GET['id'];
$materiel = mysqli_fetch_assoc(fetchMateriel($data));
$image = mysqli_fetch_assoc(fetchImage($data));
$dispo_materiel = mysqli_fetch_assoc(fetchDispo($materiel['disponibilite_id']));
$dispo = $dispo_materiel['nom'];
if($materiel['set_id'] != 0) {
    $set = mysqli_fetch_assoc(fetchSet($materiel['set_id']));
}
if($materiel['categorie_id'] != 0) {
    $cat_materiel = mysqli_fetch_assoc(fetchCategorie($materiel['categorie_id']));
}
?>


<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $materiel['nom']; ?> - Fiche détaillée</title>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="css/dashboard.css">
        <link rel="stylesheet" href="css/fonts.css">
        <link rel="stylesheet" href="css/materiel.css">
    </head>
    <body>
        <?php include 'nav.php'; ?>
        <div class="container-fluid">
            <div class="row">
                <?php include 'side-menu-etudiants.php'; ?>
                <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                    <h1 class="page-header"><?php echo $materiel['nom']; ?><?php labelDispoEtudiant($dispo);?></h1>
                    <div class="row">
                        <div class="col-md-5">
                            <img class="mat_disp" src="ressources/images/<?php echo $image['adresse']; ?>" alt="">
                        </div>
                        <div class="col-md-7">
                           <button class="btn btn-primary confirmAdd" value="<?php echo $data; ?>" onclick="ajouterMateriel(this)">Ajouter au panier</button>
                           <br>
                           <br>
                           <br>
                            <h3>Description</h3>
                            <p>
                                <?php
                                    if(!empty($materiel['description'])) {
                                        echo $materiel['description'];
                                    } else {
                                        echo "Pas de description disponible pour ce matériel.";
                                    }
                                ?>
                            </p>
                            <br>
                            <h3>Fiche de renseignement</h3>
                            <?php
                                    if(!empty($materiel['fiche_technique'])) {
                                        echo "<a href='ressources/fiches/".$materiel['fiche_technique']."'><button class='btn btn-default' value='' onclick=''>Voir la fiche</button></a>";
                                    } else { ?>
                                        <button class="btn btn-default" disabled value="" onclick="">Voir la fiche</button>
                                    <?php }
                                ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="js/jquery-1.11.2.min.js"></script>
        <script src="js/jquery-ui-1.11.2/jquery-ui.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="js/ekko-lightbox.min.js"></script>
        <script>
            $(document).ready(function ($) {
                // delegate calls to data-toggle="lightbox"
                $(document).delegate('*[data-toggle="lightbox"]', 'click', function(event) {
                    event.preventDefault();
                    return $(this).ekkoLightbox({
                        onNavigate: false
                    });
                });
            });
        </script>
    </body>
</html>