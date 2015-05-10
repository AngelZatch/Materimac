<?php
session_start();
require_once 'settings/db_connect.php' ;
include 'functions/set.php';
include 'functions/categorie.php';
include 'functions/set_mat_common.php';

$dispo_array = getDispo();
$cat_array = getCategorie();
?>
<form action="set_ajout.php" method="post">
   <div class="form-group">
        <label class="control-label">Nom du set <span class="mandatory">*</span></label>
        <input class="form-control" type="text" name="nom">
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
        <label class="control-label" >Description <span class="mandatory">*</span></label>
        <textarea class="form-control" name="description"></textarea>                 
        <br>
        <input type="submit" name="addSet" value="Ajouter" class="btn btn-custom btn-custom-validate">
   </div>            
</form>