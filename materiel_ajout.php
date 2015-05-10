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
<div class="row">
	<form action="materiel_liste.php" method="post" class="lightbox-form">            
   <div class="form-group">
        <label class="control-label" style="display:none;">Nom du matériel <span class="mandatory">*</span></label>
        <input class="form-control" type="text" name="nom" placeholder="Nom du matériel">
	</div>  
   <div class="form-group form-inline">
		<label class="control-label" style="display:none;">Référence</label>
		<input class="form-control grouped" type="text" name="reference" placeholder="Référence">
		<label class="control-label" style="display:none;">Numéro de CN</label>
		<input class="form-control grouped" type="text" name="num_cn" placeholder="Numéro de CN">
		<label class="control-label" style="display:none;">Numéro propriétaire</label>
		<input class="form-control grouped" type="text" name="num_prop" placeholder="Numéro propriétaire">
   </div>
   <div class="form-group form-inline">
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
        </div>
        <div class="form-group form-inline">
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
        </div>
        <div class="form-group">
        <label class="control-label">Fiche Technique</label>
        <button class="btn btn-default">Importer...</button>
        <br>
        <br>
        <label class="control-label">Description <span class="mandatory">*</span></label>
        <textarea class="form-control" name="description"></textarea>
        <br>
        <label class="control-label">Notes</label>
        <textarea class="form-control" name="note"></textarea>
        <br>
        <input type="submit" name="addMateriel" value="Ajouter" class="btn btn-custom btn-custom-validate confirmAdd">
        </div>
	</form>
</div>