<?php
require_once 'settings/connection.php';
require_once 'functions/f_reservations.php';

$data = $_GET['id'];
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Liste des Etudiants</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/dashboard.css">
</head>
<body>
    <?php include 'nav.php'; ?>
    <div class="container-fluid">
        <div class="row">
            <?php include 'side-menu.php'; ?>
           <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
               <h1 class="page-header">Réservations à venir</h1>
               <div class="menu-bar">
                    <ul class="nav nav-pills" id="promotions">
                        <li role="presentation" class="active"><a href="#">Tous</a></li>
                        <li role="presentation"><a href="#">Valides</a></li>
                        <li role="presentation"><a href="#">En attente</a></li>
                    </ul>
                </div>
                <br><br>
               <div class="table-responsive">
                   <table class="table table-striped table-hover">
                       <thead>
                           <tr>
                               <th class="col-sm-2">Date de soumission</th>
                               <th class="col-sm-2">Nom</th>
                               <th class="col-sm-1">Référence</th>
                               <th class="col-sm-1">Type de projet</th>
                               <th class="col-sm-2">Date de début</th>
                               <th class="col-sm-2">Date de fin</th>
                               <th class="col-sm-2">Actions</th>
                           </tr>
                       </thead>
                       <?php afficherReservation($data);?>
                   </table>
               </div>
           </div>
        </div>
    </div>
    
    <script src="js/jquery-1.11.2.min.js"></script>
    <script src="js/jquery-ui-1.11.2/jquery-ui.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>