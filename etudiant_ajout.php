<?php
session_start();
require_once 'settings/db_connect.php';
require_once 'functions/etudiants.php';
?>


<div class="row">
	<form action="etudiant_liste.php?annee=<?php echo $annee;?>">
                              <div class="form-group">
                                <label class="control-label" for="prenom">Prénom</label>
                                <input class="form-control" type="text" name ="prenom" placeholder="Prénom">
                                <br>
                                <label class="control-label" for="nom">Nom</label>
                                <input class="form-control" type="text" name="nom" placeholder="Nom">
                                <br>
                                <label class="control-label" for="numero_etudiant">Numéro étudiant</label>
                                <input class="form-control" type="text" name="numero_etudiant" placeholder="Numéro étudiant">
                                <br>
                                <label class="control-label" for="formation">Formation</label>
                                <select class="form-control" name="formation" id="">
                                    <option value="1">IMAC</option>
                                    <option value="2">IR</option>
                                </select>
                                <br>
                                <label for="promotion" class="control-label">Promotion</label>
                                <?php fetchPromotion($data); ?>
                                <br>
                                <input class="btn btn-custom btn-custom-validate confirmAdd" type="submit" value="Ajouter" name="addEtudiant">
		</div>
	</form>
</div>