<?php
require_once 'settings/connection.php';
include 'functions/etudiants.php';
include 'functions/materiel.php';
include 'functions/categorie.php';
include 'functions/set.php';
include 'functions/set_mat_common.php';

$materiels1 = getMateriel();
$materiels2 = getMateriel();
$sets = getSet();
$categories1 = getCategorie();
$categories2 = getCategorie();
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Liste du Matériel</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/dashboard.css">
</head>
<body>
    <?php include 'nav.php'; ?>
    <div class="container-fluid">
        <div class="row">
            <?php include 'side-menu.php'; ?>
           <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
               <h1 class="page-header">Inventaire de Matériel</h1>
               <div class="row">
                   <div class="col-md-4">
                       <h2>Catégories</h2>
                       <?php 
                            while($categorie = mysqli_fetch_assoc($categories1)) {
                                $cat_nom = $categorie['nom'];
                                $cat_id = $categorie['id'];
                        ?>
                                <input type="checkbox" name="<?php echo $cat_id; ?>" id=""><?php echo $cat_nom; ?>
                                <br>
                       <?php
                            }
                        ?>
                        <a class="btn btn-default" href="categorie_display.php">Gérer les catégories</a>
                   </div>
                   <div class="col-md-4">
                       <h2>Disponibilité</h2>
                       <input type="checkbox"> <img src="icons/materiel-disponible.png" alt="">Disponible<br>
                       <input type="checkbox"> <img src="icons/materiel-reserve.png" alt=""> Prévu aujourd'hui<br>
                       <input type="checkbox"> <img src="icons/materiel-indisponible.png" alt=""> Indisponible<br>
                       <input type="checkbox"> <img src="icons/materiel-gele.png" alt=""> Gelé<br>
                   </div>
                   <div class="col-md-4">
                       <h2>Etat du matériel</h2>
                       <input type="checkbox" name="" id="">Neuf
                       <br>
                       <input type="checkbox" name="" id="">Très bon état
                       <br>
                       <input type="checkbox" name="" id="">Bon état
                       <br>
                       <input type="checkbox" name="" id="">OK
                       <br>
                       <input type="checkbox" name="" id="">Mauvais état
                       <br>
                       <input type="checkbox" name="" id="">Cassé
                       <br>
                   </div>
               </div>
               <div class="table-responsive">
                  <?php
                        while($categorie = mysqli_fetch_assoc($categories2)) {
                   ?>
                     <?php 
                            if($categorie['nom'] != "Set vidéo") {
                       ?>
                          <h3><?php echo $categorie['nom']; ?></h3>
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
                                    while($materiel = mysqli_fetch_assoc($materiels1)) {
                                        if($materiel['set_id'] == 0 && $materiel['categorie_id'] == $categorie['id']){ 
                                            $id = $materiel['id'];
                                            $nom = $materiel['nom'];
                                            $reference = $materiel['reference'];
                                            $num_cn = $materiel['numero_cn'];
                                            $etat_materiel = mysqli_fetch_assoc(fetchEtat($materiel['etat_id']));
                                            $etat = $etat_materiel['nom'];
                                            $dispo_materiel = mysqli_fetch_assoc(fetchDispo($materiel['disponibilite_id']));
                                            $dispo = $dispo_materiel['nom'];
                                            $note = $materiel['note'];
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
                                    }
                               ?>
                           </table>
                    <?php
                            } else {
                    ?>
                                <h3><?php echo $categorie['nom']; ?></h3>
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
                                        while($set = mysqli_fetch_assoc($sets)) {
                                            $set_id = $set['id'];
                                            $set_nom = $set['nom'];
                                            $dispo_set = mysqli_fetch_assoc(fetchDispo($set['disponibilite_id']));
                                            $set_dispo = $dispo_set['nom'];
                                    ?>
                                            <tbody class="table table-striped">
                                               <tr style="background-color:#e8e8e8;">
                                                   <td class="col-sm-2"><a href="set_edit.php?id=<?php echo $set_id; ?>"><?php echo $set_nom; ?></a></td>
                                                   <td class="col-sm-3"></td>
                                                   <td class="col-sm-1"></td>
                                                   <td class="col-sm-1"></td>
                                                   <td class="col-sm-1"><?php echo $set_dispo; ?></td>
                                                   <td class="col-sm-2"></td>
                                                   <td class="col-sm-2">
                                                       <form method="post" action="liste-materiel.php">
                                                        <input type="hidden" name="id" value="<?php echo $set_id; ?>">
                                                        <input type="submit" value="Supprimer" name="deleteSet" class="btn btn-default">
                                                        </form>
                                                   </td>
                                               </tr>
                       <?php
                                            while($materiel = mysqli_fetch_assoc($materiels2)) {
                                                if($materiel['set_id'] == $set_id){ 
                                                    $id = $materiel['id'];
                                                    $nom = $materiel['nom'];
                                                    $reference = $materiel['reference'];
                                                    $num_cn = $materiel['numero_cn'];
                                                    $etat_materiel = mysqli_fetch_assoc(fetchEtat($materiel['etat_id']));
                                                    $etat = $etat_materiel['nom'];
                                                    $note = $materiel['note'];
                                   ?>
                                              <tr>
                                                    <td class="col-sm-2"><?php echo "<a href='materiel_edit.php?id=" . $id . "'>" . $nom . "</a>"; ?></td>
                                                   <td class="col-sm-3"><?php echo $reference; ?></td>
                                                   <td class="col-sm-1"><?php echo $num_cn; ?></td>
                                                   <td class="col-sm-1"><?php echo $etat; ?></td>
                                                   <td class="col-sm-1"></td>
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
                                   </tbody>
                                   <?php
                                            }
                                        }
                                   ?>
                               </table>
                    <?php
                            }
                        }
                    ?>
               </div>
           </div>
        </div>
    </div>
    
    <script src="js/jquery-1.11.2.min.js"></script>
    <script src="js/jquery-ui-1.11.2/jquery-ui.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>