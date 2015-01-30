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
               <h1 class="page-header">Modifier un matériel</h1>

                <form action="materiel_edit.php?id=<?php echo $data;?>" method="post">
                    <input type="hidden" name="id" value="<?php echo $materiel['id'];?>">

                    <label>Nom du matériel <span class="mandatory">*</span></label>
                    <input type="text" name="nom" value="<?php echo $materiel['nom']; ?>">

                    <br>
                    <label>Référence</label>
                    <input type="text" name="reference" value="<?php echo $materiel['reference']; ?>">

                    <br>
                    <label>Numéro de CN</label>
                    <input type="text" name="num_cn" value="<?php echo $materiel['numero_cn']; ?>">

                    <br>
                    <label>Numéro propriétaire</label>
                    <input type="text" name="num_prop" value="<?php echo $materiel['numero_proprietaire']; ?>">

                    <br>
                    <label>Set</label>
                    <select name="set">

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
                    <label>État <span class="mandatory">*</span></label>
                    <select name="etat">
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
                    <label>Disponibilité</label>
                    <select name="dispo">
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
                    <label>Fiche Technique</label>
                    <input type="text" name="fiche" value="<?php echo $materiel['fiche_technique']; ?>">

                    <br>
                    <label>Catégorie</label>
                    <select name="categorie">
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
                    <label>Description <span class="mandatory">*</span></label>
                    <textarea name="description"><?php echo $materiel['description']; ?></textarea>

                    <br>
                    <label>Notes</label>
                    <textarea name="note"><?php echo $materiel['note']; ?></textarea>

                    <br>
                    <input type="submit" name="updateMateriel" value="Valider" class="btn btn-default"> <input type="reset" value="Annuler" class="btn btn-default">

                </form>
            </div>
        </div>
    </div>
    
    <script src="js/jquery-1.11.2.min.js"></script>
    <script src="js/jquery-ui-1.11.2/jquery-ui.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>