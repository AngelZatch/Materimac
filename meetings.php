<?php
session_start();
require_once 'settings/connection.php';
require_once 'functions/etudiants.php';
include 'functions/meetings_handler.php';

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
					<table class="table table-bordered">
              			<tbody>
              			<?php $numHours = getHours($_SESSION['gestionnaire']);?>
               			<tr><td><div class="btn-group"><button class="btn btn-default"><span class="glyphicon glyphicon-edit"></span></button><button class="btn btn-default"><span class="glyphicon glyphicon-plus"></span></button></div></td></tr>
              		</tbody>
               		</table>
               </div>
               <!-- Jours -->
			  <div class="panel panel-default col-sm-2">
               	<div class="panel-heading" id="first-day"><?php echo (new DateTime('today'))->add(new DateInterval("P1D"))->format('l d');?></div>
					<table class="table table-bordered">
              			<tbody>
              			<?php for($i = 0; $i < $numHours; $i++) echo "<tr><td></td></tr>";?>
              		</tbody>
               		</table>
               </div>
				  <div class="panel panel-default col-sm-2">
               	<div class="panel-heading"><?php echo (new DateTime('today'))->add(new DateInterval("P2D"))->format('l d');?></div>
					<table class="table table-bordered">
              			<tbody>
						<?php for($i = 0; $i < $numHours; $i++) echo "<tr><td></td></tr>";?>
              		</tbody>
               		</table>
               </div>
			  <div class="panel panel-default col-sm-2">
               	<div class="panel-heading"><?php echo (new DateTime('today'))->add(new DateInterval("P3D"))->format('l d');?></div>
					<table class="table table-bordered">
              			<tbody>
						<?php for($i = 0; $i < $numHours; $i++) echo "<tr><td></td></tr>";?>
              		</tbody>
               		</table>
               </div>
			  <div class="panel panel-default col-sm-2">
               	<div class="panel-heading"><?php echo (new DateTime('today'))->add(new DateInterval("P4D"))->format('l d');?></div>
					<table class="table table-bordered">
              			<tbody>
						<?php for($i = 0; $i < $numHours; $i++) echo "<tr><td></td></tr>";?>
              		</tbody>
               		</table>
               </div>
			  <div class="panel panel-default col-sm-2">
               	<div class="panel-heading"><?php echo (new DateTime('today'))->add(new DateInterval("P1D"))->format('l d');?></div>
					<table class="table table-bordered">
              			<tbody>
						<?php for($i = 0; $i < $numHours; $i++) echo "<tr><td></td></tr>";?>
              		</tbody>
               		</table>
               </div>
        </div>
    </div>
    
    <script src="js/jquery-1.11.2.min.js"></script>
    <script src="js/jquery-ui-1.11.2/jquery-ui.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>