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
    <link rel="apple-touch-icon" sizes="57x57" href="icons/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="icons/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="icons/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="icons/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="icons/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="icons/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="icons/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="icons/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="icons/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="icons/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="icons/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="icons/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="icons/favicon-16x16.png">
	<link rel="manifest" href="icons/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="icons/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">
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