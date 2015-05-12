<?php
session_start();
require_once 'settings/db_connect.php';
require_once 'functions/f_reservations.php';

if(!isset($_SESSION['power'])){
	header('Location:portal.php');
}

$data = $_GET['id'];
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Liste des Etudiants</title>
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
               <?php 
                    echo "<h1 class='page-header'>";?>
                    <span class="glyphicon glyphicon-eye-open"></span> 
                    <?php
                    switch($data){
    
                        case 1:
                            echo "Réservations à venir</h1>
                                <div class='menu-bar'>
                                    <ul class='nav nav-pills' id='promotions'>
                                        <li role='presentation' class='active'><a href='#'>Toutes</a></li>
                                        <li role='presentation'><a href='#'>En attente</a></li>
                                        <li role='presentation'><a href='#'>Validées</a></li>
                                    </ul>
                                </div>";
                            break;
    
                        case 2:
                            echo "Réservations en cours</h1>
                                <div class='menu-bar'>
                                    <ul class='nav nav-pills' id='promotions'>
                                        <li role='presentation' class='active'><a href='#'>Toutes</a></li>
                                        <li role='presentation'><a href='#'>En cours</a></li>
                                        <li role='presentation'><a href='#'>En retard</a></li>
                                    </ul>
                                </div>";
                            break;
    
                        case 3:
                            echo "Réservations terminées</h1>
                                <div class='menu-bar'>
                                    <ul class='nav nav-pills' id='promotions'>
                                        <li role='presentation' class='active'><a href='#'>Toutes</a></li>
                                        <li role='presentation'><a href='#'>Terminées</a></li>
                                        <li role='presentation'><a href='#'>Annulées</a></li>
                                    </ul>
                                </div>";
                            break;
                }?>
               
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
                   </table>
                   <?php afficherReservation($data);?>
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