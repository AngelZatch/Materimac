<?php
session_start();
require_once 'settings/db_connect.php' ;
include 'functions/materiel.php';
include 'functions/set.php';
include 'functions/categorie.php';
include 'functions/set_mat_common.php';

$dispo_array = getDispo();
$etat_array = getEtat();
$cat_array = getCategorie();
$set_array = getSet();
?>

<html>
<head>
    <meta charset="UTF-8">
    <title>Gestion de matériel IMAC</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/dashboard.css">
</head>
<body>
        <?php include 'nav.php'; ?>
       <div class="container-fluid">
          <div class="row">
              <?php include 'side-menu.php'; ?>
               <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                  <a href="liste-materiel.php">
                     <button class="btn btn-default">
                      <span class="glyphicon glyphicon-chevron-left"></span>
                      Retourner à l'inventaire
                      </button>
                  </a>
                  <br><br>
                   <h1 class="page-header">Ajouter du matériel</h1>
                    <form action="materiel_ajout.php" method="post">            
                       <div class="form-group">
                            <label class="control-label">Nom du matériel <span class="mandatory">*</span></label>
                            <input class="form-control" type="text" name="nom">   
                            <br>
                            <label class="control-label">Référence</label>
                            <input class="form-control" type="text" name="reference">
                            <br>
                            <label class="control-label">Numéro de CN</label>
                            <input class="form-control" type="text" name="num_cn">
                            <br>
                            <label class="control-label">Numéro propriétaire</label>
                            <input class="form-control" type="text" name="num_prop">
                            <br>
                            <label class="control-label">Set</label>
                            <select class="form-control" name="set">
                               <option value="0">Aucun set</option>
                                <?php
                                    while($row_set = mysqli_fetch_assoc($set_array)) {
                                        $id_set = $row_set['id'];
                                        $nom_set = $row_set['nom'];
                                    ?>
                                            <option value="<?php echo $id_set; ?>"> <?php echo $nom_set; ?></option>
                                    <?php
                                    }
                                ?>
                            </select>
                            <br>
                            <label class="control-label">État <span class="mandatory">*</span></label>
                            <select class="form-control" name="etat">
                                <?php
                                    while($row_etat = mysqli_fetch_assoc($etat_array)) {
                                        $id_etat = $row_etat['id'];
                                        $nom_etat = $row_etat['nom'];
                                    ?>
                                            <option value="<?php echo $id_etat; ?>"> <?php echo $nom_etat; ?></option>
                                    <?php
                                    }
                                ?>
                            </select>
                            <br>
                            <label class="control-label">Disponibilité</label>
                            <select class="form-control" name="dispo">
                                <?php
                                    while($row_dispo = mysqli_fetch_assoc($dispo_array)) {
                                        $id_dispo = $row_dispo['id'];
                                        $nom_dispo = $row_dispo['nom'];
                                    ?>
                                            <option value="<?php echo $id_dispo; ?>"> <?php echo $nom_dispo; ?></option>
                                    <?php
                                    }
                                ?>
                            </select>
                            <br>
                            <label class="control-label">Fiche Technique</label>
                            <button class="btn btn-default">Importer...</button>
                            <br>
                            <label class="control-label">Catégorie</label>
                            <select class="form-control" name="categorie">
                               <option value="0">Aucune catégorie</option>
                                <?php
                                    while($row_cat = mysqli_fetch_assoc($cat_array)) {
                                        $id_cat = $row_cat['id'];
                                        $nom_cat = $row_cat['nom'];
                                    ?>
                                            <option value="<?php echo $id_cat; ?>"> <?php echo $nom_cat; ?></option>
                                    <?php
                                    }
                                ?>
                            </select>
                            <br>
                            <label class="control-label">Description <span class="mandatory">*</span></label>
                            <textarea class="form-control" name="description"></textarea>
                            <br>
                            <label class="control-label">Notes</label>
                            <textarea class="form-control" name="note"></textarea>
                            <br>
                            <input type="submit" name="addMateriel" value="Ajouter" class="btn btn-primary">
                       </div>
                   </form>
                </div>
            </div>
        </div>
    
    <script src="js/jquery-1.11.2.min.js"></script>
    <script src="js/jquery-ui-1.11.2/jquery-ui.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>