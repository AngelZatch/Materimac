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