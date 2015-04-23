<?php
session_start();
require_once 'settings/db_connect.php';
include 'functions/recherche.php';
include 'functions/set.php';
include 'functions/categorie.php';
include 'functions/materiel.php';
include 'functions/etudiants.php';
include 'functions/set_mat_common.php';

$data = $_GET['recherche'];
$search_materiel = rechercherMateriel($data);
//$search_sets = rechercherSet($data);
//$search_etudiant = rechercherEtudiant($data);
$categories = getCategorie();
?>

<html>
<head>
    <meta charset="UTF-8">
    <title>Résultats de la recherche</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/dashboard.css">
</head>
<body>
    <?php include 'nav.php'; ?>
   <div class="container-fluid">
      <div class="row">
          <?php include 'side-menu.php'; ?>
           <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
               <h1 class="page-header">Résultats de la recherche</h1>
               
               <h3>Recherche de matériels</h3>
               <table class="table table-striped table-hover">
                               <thead>
                                   <tr>
                                       <th class="col-sm-2">Nom Produit</th>
                                       <th class="col-sm-3">Référence</th>
                                       <th class="col-sm-1">n°CN</th>
                                       <th class="col-sm-1">Etat</th>
                                       <th class="col-sm-1">Disponibilité</th>
                                       <th class="col-sm-2">Notes</th>
                                       <th class="col-sm-2">Actions</th>
                                   </tr>
                               </thead>
                               <?php
                                    while($search_mat = mysqli_fetch_assoc($search_materiel)) {
                                        $id = $search_mat['id'];
                                        $nom = $search_mat['nom'];
                                        $reference = $search_mat['reference'];
                                        $num_cn = $search_mat['numero_cn'];
                                        $etat_materiel = mysqli_fetch_assoc(fetchEtat($search_mat['etat_id']));
                                        $etat = $etat_materiel['nom'];
                                        $dispo_materiel = mysqli_fetch_assoc(fetchDispo($search_mat['disponibilite_id']));
                                        $dispo = $dispo_materiel['nom'];
                                        $note = $search_mat['note'];
                               ?>
                                      <tr>
                                           <td class="col-sm-2"><?php echo "<a href='materiel_edit.php?id=" . $id . "'>" . $nom . "</a>"; ?></td>
                                           <td class="col-sm-3"><?php echo $reference; ?></td>
                                           <td class="col-sm-1"><?php echo $num_cn; ?></td>
                                           <td class="col-sm-1"><?php echo $etat; ?></td>
                                           <td class="col-sm-1"><?php echo $dispo; ?></td>
                                           <td class="col-sm-2"><?php echo $note; ?></td>
                                           <td class="col-sm-2">
                                               <form method="post" action="liste-materiel.php">
                                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                                <input type="submit" value="Supprimer" name="deleteMateriel" class="btn btn-default">
                                                </form>
                                           </td>
                                   </tr>
                           <?php
                                }
                            ?>
               </table>
           </div>
      </div>
    </div>
    
    <script src="js/jquery-1.11.2.min.js"></script>
    <script src="js/jquery-ui-1.11.2/jquery-ui.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>