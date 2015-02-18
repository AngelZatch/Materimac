<?php
    require_once 'settings/db_connect.php' ;
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


<html>
<head>
    <meta charset="UTF-8">
    <title>Modification d'un matériel</title>
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
               <h1 class="page-header">Modifier un matériel</h1>
                <form action="materiel_edit.php?id=<?php echo $data;?>" method="post">
                   <div class="form-group">
                        <input type="hidden" name="id" value="<?php echo $materiel['id'];?>">   
                        <label class="control-label">Nom du matériel <span class="mandatory">*</span></label>
                        <input class="form-control" type="text" name="nom" value="<?php echo $materiel['nom']; ?>">
                        <br>
                        <label class="control-label">Référence</label>
                        <input class="form-control" type="text" name="reference" value="<?php echo $materiel['reference']; ?>">
                        <br>
                        <label class="control-label">Numéro de CN</label>
                        <input class="form-control" type="text" name="num_cn" value="<?php echo $materiel['numero_cn']; ?>">
                        <br>
                        <label class="control-label">Numéro propriétaire</label>
                        <input class="form-control" type="text" name="num_prop" value="<?php echo $materiel['numero_proprietaire']; ?>">
                        <br>
                        <label class="control-label">Set</label>
                        <select class="form-control" name="set">

                            <?php
                                if($set['id'] == 0) {
                            ?>
                                <option value="0" selected="selected">Aucun set</option>  
                            <?php
                                } else {
                            ?>
                               <option value="0" selected="selected">Aucun set</option>  
                            <?php
                                }
                                while($row_set = mysqli_fetch_assoc($set_array)) {
                                    $id_set = $row_set['id'];
                                    $nom_set = $row_set['nom'];
                                    if($id_set == $set['id']) {
                                ?>
                                        <option selected="selected" value="<?php echo $id_set; ?>"> <?php echo $nom_set; ?></option>
                                <?php
                                    } else {
                                ?>
                                        <option value="<?php echo $id_set; ?>"> <?php echo $nom_set; ?></option>
                                <?php
                                    }
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
                                    if($id_etat == $etat_materiel['id']) {
                                ?>
                                        <option selected="selected" value="<?php echo $id_etat; ?>"> <?php echo $nom_etat; ?></option>
                                <?php
                                    } else {
                                ?>
                                        <option value="<?php echo $id_etat; ?>"> <?php echo $nom_etat; ?></option>
                                <?php
                                    }
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
                                    if($id_dispo == $dispo_materiel['id']) {
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
                                if($id_cat == $cat_materiel['id']) {
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
                        <textarea class="form-control" name="description"><?php echo $materiel['description']; ?></textarea>
                        <br>
                        <label class="control-label">Notes</label>
                        <textarea class="form-control" name="note"><?php echo $materiel['note']; ?></textarea>
                        <br>
                        <input type="submit" name="updateMateriel" value="Valider" class="btn btn-primary">
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