<?php
session_start();
require_once 'settings/db_connect.php';
include 'functions/materiel.php';
include 'functions/set.php';
include 'functions/categorie.php';
include 'functions/set_mat_common.php';

$data = $_GET['id'];
$materiel = mysqli_fetch_assoc(fetchMateriel($data));
$dispo_materiel = mysqli_fetch_assoc(fetchDispo($materiel['disponibilite_id']));
$etat_materiel = mysqli_fetch_assoc(fetchEtat($materiel['etat_id']));
if($materiel['set_id'] != 0) {
    $set = mysqli_fetch_assoc(fetchSet($materiel['set_id']));
}
if($materiel['categorie_id'] != 0) {
    $cat_materiel = mysqli_fetch_assoc(fetchCategorie($materiel['categorie_id']));
}
$dispo_array = getDispo();
$etat_array = getEtat();
$set_array = getSet();
$cat_array = getCategorie();    
?>

?>


<html>
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/dashboard.css">
</head>
<body>
    <?php include 'nav.php'; ?>
   <div class="container-fluid">
      <div class="row">
          <?php include 'side-menu.php'; ?>
           <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
               <h1 class="page-header"></h1>
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