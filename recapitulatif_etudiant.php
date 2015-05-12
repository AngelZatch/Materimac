<?php
    session_start();
    require_once 'settings/db_connect.php';
?>
<form action="#" method="post" class="lightbox-form">
   <div class="form-group">
        <label class="control-label">Matériels à emprunter</label>
        <ul id="panier-resa"></ul>
    </div>
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
            <label class="control-label col-sm-12">Ajouter un étudiant :</label>
        </div>
        <div class="row">
            <input class="form-control col-sm-6" style="margin: 10px 50px 10px 20px;" type="text" name="nom_etudiant1">
            <input class="form-control col-sm-6" style="margin-top: 10px;"  type="text" name="nom_etudiant2">
        </div>
        <div class="row">
            <input class="form-control col-sm-6" style="margin: 10px 50px 10px 20px;"  type="text" name="nom_etudiant3">
            <input class="form-control col-sm-6" style="margin-top: 10px;" type="text" name="nom_etudiant4">
        </div>
        <div class="row">
            <input class="form-control col-sm-6" style="margin: 10px 50px 10px 20px;"  type="text" name="nom_etudiant5">
            <input class="form-control col-sm-6" style="margin-top: 10px;" type="text" name="nom_etudiant6">
        </div>
    </div>
    <div class="form-group form-inline">
       <div class="row">
            <label class="control-label col-sm-3" style="padding-top:7px;">Enseignant :</label>
            <input class="form-control col-sm-9" type="text" name="enseignant"><br>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label">Motif :</label>
        <textarea name="motif" id="motif" class="form-control" cols="30" rows="10"></textarea>
    </div>
    <input type="submit" name="validerDemande" value="Valider" class="btn btn-custom btn-custom-validate confirmAdd">
</form>