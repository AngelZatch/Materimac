<?php
session_start();
require_once 'settings/connection.php';
require_once 'functions/etudiants.php';
include 'functions/meetings_handler.php';

if(!isset($_SESSION['power'])){
	header('Location:portal.php');
}
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Liste des Etudiants</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/meetings.css">
</head>
<body>
    <?php include 'nav.php'; ?>
    <div class="container-fluid">
        <div class="row">
            <?php include 'side-menu.php'; ?>
           <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
               <h1 class="page-header">Vos rendez-vous</h1>
               <div class="btn btn-group">
                   <button class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span> Semaine précédente</button>
                   <button class="btn btn-default"><span class="glyphicon glyphicon-time"></span> Semaine courante</button>
                   <button class="btn btn-default">Semaine suivante <span class="glyphicon glyphicon-arrow-right"></span></button>
               </div><br><br>
               
               <!-- Tableau des horaires -->
               <div class="panel panel-default col-sm-1">
               	<div class="panel-heading">Horaires</div>
					<?php construct($_SESSION['gestionnaire']);?>
        </div>
    </div>
    
    <script src="js/jquery-1.11.2.min.js"></script>
    <script src="js/jquery-ui-1.11.2/jquery-ui.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>