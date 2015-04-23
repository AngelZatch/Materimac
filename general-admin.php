<?php
session_start();
require_once 'settings/db_connect.php';
require_once 'functions/etudiants.php';

if(!isset($_SESSION['power'])){
	header('Location:portal.php');
}
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Administration Générale</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/dashboard.css">
</head>
<body>
    <?php include 'nav.php'; ?>
    <div class="container-fluid">
        <div class="row">
            <?php include 'side-menu.php'; ?>
           <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
           <h1 class="page-header">Administration Générale</h1>
           <h2>Gestion des Formations</h2>
           <div class="table-responsive">
               <table class="table table-striped">
                   <thead>
                       <tr>
                           <th>Nom</th>
                           <th>Acronyme</th>
                           <th>Type</th>
                           <th>Actions</th>
                       </tr>
                   </thead>
                   <tr>
                       <td>Image Multimédia Audiovisuel Communication</td>
                       <td>IMAC</td>
                       <td>Ingénieur</td>
                       <td>Modifier</td>
                   </tr>
                  <tr>
                       <td>Génie Civil</td>
                       <td>GC</td>
                       <td>Ingénieur</td>
                       <td>Modifier</td>
                   </tr>
                  <tr>
                       <td>Informatique et Réseaux</td>
                       <td>IR</td>
                       <td>Ingénieur</td>
                       <td>Modifier</td>
                   </tr>
                  <tr>
                       <td>Langues Etrangères Appliquées</td>
                       <td>LEA</td>
                       <td>Licence</td>
                       <td>Modifier</td>
                   </tr>
               </table>
           </div>
           <h2>Gestion des Promotions</h2>
          <div class="table-responsive">
               <table class="table table-striped">
                   <thead>
                       <tr>
                           <th>Formation</th>
                           <th>Année</th>
                           <th>Actions</th>
                       </tr>
                   </thead>
                   <tr>
                       <td>IMAC</td>
                       <td>2015</td>
                       <td>Supprimer</td>
                   </tr>
                  <tr>
                       <td>IMAC</td>
                       <td>2016</td>
                       <td>Supprimer</td>                       
                   </tr>
                  <tr>
                       <td>IMAC</td>
                       <td>2017</td>
                       <td>Supprimer</td>
                   </tr>
               </table>
           </div>
			   <div class="panel panel-superdanger">
                    <div class="panel-heading" id="admin-warning">Gestion globale</div>
                    <div class="panel-body">
                      	<p class="super-option">Supprimer toutes les Attestations de Responsabilité Cilvile<button class="btn btn-superdanger">Supprimer les attestations</button></p>
                      	<p class="super-option">Supprimer tout l'historique<button class="btn btn-superdanger">Supprimer l'historique</button></p>
                      	<p class="super-option so-last">Geler tout l'inventaire<button class="btn btn-superdanger">Geler</button></p>                       
                    </div>
                </div>
           </div>
        </div>
    </div>
    
    <script src="js/jquery-1.11.2.min.js"></script>
    <script src="js/jquery-ui-1.11.2/jquery-ui.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>