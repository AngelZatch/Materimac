<?php
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
                   <h1 class="page-header">Ajouter du matériel</h1>

                    <form action="materiel_ajout.php" method="post">            
                        <label>Nom du matériel <span class="mandatory">*</span></label>
                        <input type="text" name="nom">

                        <br>
                        <label>Référence</label>
                        <input type="text" name="reference">

                        <br>
                        <label>Numéro de CN</label>
                        <input type="text" name="num_cn">

                        <br>
                        <label>Numéro propriétaire</label>
                        <input type="text" name="num_prop">

                        <br>
                        <label>Set</label>
                        <select name="set">
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
                        <label>État <span class="mandatory">*</span></label>
                        <select name="etat">
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
                        <label>Disponibilité</label>
                        <select name="dispo">
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
                        <label>Fiche Technique</label>
                        <input type="text" name="fiche">

                        <br>
                        <label>Catégorie</label>
                        <select name="categorie">
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
                        <label>Description <span class="mandatory">*</span></label>
                        <textarea name="description"></textarea>

                        <br>
                        <label>Notes</label>
                        <textarea name="note"></textarea>

                        <br>
                        <input type="submit" name="addMateriel" value="Valider" class="btn btn-default"> <input type="reset" value="Annuler" class="btn btn-default">

                    </form>
                </div>
            </div>
        </div>
    
    <script src="js/jquery-1.11.2.min.js"></script>
    <script src="js/jquery-ui-1.11.2/jquery-ui.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>