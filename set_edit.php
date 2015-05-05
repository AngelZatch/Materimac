<?php
session_start();
require_once 'settings/db_connect.php' ;
include 'functions/materiel.php';
include 'functions/set.php';
include 'functions/recherche.php';
include 'functions/categorie.php';
include 'functions/set_mat_common.php';

$data = $_GET['id'];
$set = mysqli_fetch_assoc(fetchSet($data));
if(!empty($_GET['recherche'])) {
    $search = $_GET['recherche'];
    $search_materiel = rechercherMateriel($search);
}

$dispo_set = mysqli_fetch_assoc(fetchDispo($set['disponibilite_id']));
$cat_set = mysqli_fetch_assoc(fetchCategorie($set['categorie_id']));

$dispo_array = getDispo();
$cat_array = getCategorie();
$materiels = getSetMateriel($data);
?>


<html>
<head>
    <meta charset="UTF-8">
    <title>Modfier un set</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/fonts.css">
</head>
<body>
    <?php include 'nav.php'; ?>
   <div class="container-fluid">
      <div class="row">
          <?php include 'side-menu.php'; ?>
           <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <a href="materiel_liste.php">
                <button class="btn btn-default">
                <span class="glyphicon glyphicon-chevron-left"></span>
                Retourner à l'inventaire
                </button>
            </a>
              <br><br>
               <h1 class="page-header">Modifier un set</h1>
                <form action="set_edit.php?id=<?php echo $set['id']; ?>" method="post">      
                    <div class="form-group">
                        <input type="hidden" name="id" value="<?php echo $set['id'];?>">
                        <label class="control-label">Nom du set <span class="mandatory">*</span></label>
                        <input class="form-control" type="text" name="nom" value="<?php echo $set['nom']; ?>">
                        <br>
                        <label class="control-label">Disponibilité</label>
                        <select class="form-control" name="dispo">
                            <?php
                                while($row_dispo = mysqli_fetch_assoc($dispo_array)) {
                                    $id_dispo = $row_dispo['id'];
                                    $nom_dispo = $row_dispo['nom'];
                                    if($id_dispo == $dispo_set['id']) {
                                ?>
                                        <option selected="selected" value="<?php echo $id_dispo; ?>"> <?php echo $nom_dispo; ?></option>
                                <?php
                                    } else {
                                ?>
                                        <option value="<?php echo $id_dispo; ?>"> <?php echo $nom_dispo; ?></option>
                                <?php
                                    }
                                }
                            ?>
                        </select>
                        <br>
                        <label class="control-label">Catégorie</label>
                        <select class="form-control" name="categorie">
                           <option value="0">Aucune catégorie</option>
                            <?php
                                while($row_cat = mysqli_fetch_assoc($cat_array)) {
                                    $id_cat = $row_cat['id'];
                                    $nom_cat = $row_cat['nom'];
                                if($id_cat == $cat_set['id']) {
                                ?>
                                        <option selected="selected" value="<?php echo $id_cat; ?>"> <?php echo $nom_cat; ?></option>
                                <?php
                                    } else {
                                ?>
                                        <option value="<?php echo $id_cat; ?>"> <?php echo $nom_cat; ?></option>
                                <?php
                                    }
                                }
                            ?>
                        </select>
                        <br>
                        <label class="control-label">Fiche Technique</label>
                        <button class="btn btn-default">Importer...</button>
                        <br>
                        <label class="control-label">Description <span class="mandatory">*</span></label>
                        <textarea class="form-control" name="description"><?php echo $set['description']; ?></textarea>
                        <br>
                        <input type="submit" name="updateSet" value="Valider" class="btn btn-primary">
                        <input type="reset" value="Annuler" class="btn btn-default">
                    </div>
                </form>
                
                <div class="table-responsive">
                  <h3>Contenu de <?php echo $set['nom']; ?></h3>
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
                            while($materiel = mysqli_fetch_assoc($materiels)) {
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
                                   <form method="post" action="set_edit.php?id=<?php echo $set['id']; ?>">
                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                    <input type="submit" value="Retirer du set" name="removeSetMateriel" class="btn btn-default">
                                    </form>
                               </td>
                       </tr>
                       <?php
                           }
                       ?>
                   </table>
                   
                   <h3>Ajouter du matériel</h3>
                   <form action="set_edit.php?id=<?php echo $set['id']; ?>" method="post">
                       <input type="hidden" name="id" value="<?php echo $set['id'];?>">
                        <input style="width:200px; float:left; margin-right:10px;" type="text" class="form-control" placeholder="Rechercher..." name="recherche">
                        <input type="submit" name="addSetMateriel" class="btn btn-default" value="Ok">
                  </form>
                </div>
            </div>
        </div>
    </div>
    
    <script src="js/jquery-1.11.2.min.js"></script>
    <script src="js/jquery-ui-1.11.2/jquery-ui.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>