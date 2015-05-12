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
    <link rel="stylesheet" href="css/fonts.css">
</head>
<body>
    <?php include 'nav.php'; ?>
    <div class="container-fluid">
        <div class="row">
            <?php include 'side-menu.php'; ?>
           <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
           <h1 class="page-header"><span class="glyphicon glyphicon-wrench"></span> Administration Générale</h1>
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
                       <td>1</td>
                       <td>Supprimer les étudiants</td>
                   </tr>
                  <tr>
                       <td>IMAC</td>
                       <td>2</td>
                       <td>Supprimer les étudiants</td>                       
                   </tr>
                  <tr>
                       <td>IMAC</td>
                       <td>3</td>
                       <td>Supprimer les étudiants</td>
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
    <script src="js/ekko-lightbox.min.js"></script>
    <script>
        $(document).ready(function ($) {
            // delegate calls to data-toggle="lightbox"
            $(document).delegate('*[data-toggle="lightbox"]', 'click', function(event) {
                event.preventDefault();
                return $(this).ekkoLightbox({
                    onNavigate: false
                });
            });
        });
    </script>
</body>
</html>