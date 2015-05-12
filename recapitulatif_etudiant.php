<?php
    session_start();
    require_once 'settings/db_connect.php';
?>
<form action="#" method="post" class="lightbox-form">
    <div class="form-group">
        <label class="control-label">Nom de l'emprunteur :</label>
        <?php echo $_SESSION['prenom'].' '.$_SESSION['nom']; ?><br>
    </div>
    <div class="row">
       <div class="form-group col-sm-6">
           <label class="control-label">Date de début :</label>
           <input class="form-control" type="date" name="dateDebut">
        </div>
        <div class="form-group col-sm-6">
            <label class="control-label">Date de fin :</label>
            <input class="form-control" type="date" name="dateFin">
        </div>
    </div>
    <div class="form-group form-inline">
       <div class="row">
            <label class="control-label col-sm-4">Ajouter un étudiant :</label>
            <input class="form-control col-sm-8" type="text" id="nom_etudiant"><br>
        </div>
    </div>
    <div class="form-group form-inline">
       <div class="row">
            <label class="control-label col-sm-4">Enseignant :</label>
            <input class="form-control col-sm-8" type="text" id="enseignant" name="enseignant"><br>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label">Motif :</label>
        <textarea name="motif" id="motif" class="form-control" cols="30" rows="10"></textarea>
    </div>
    <input type="submit" name="validerResa" value="Valider" class="btn btn-custom btn-custom-validate confirmAdd">
</form>