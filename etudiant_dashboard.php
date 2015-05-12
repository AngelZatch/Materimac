<?php
session_start();
require_once 'settings/db_connect.php';
if(!isset($_SESSION['power'])){
	header('Location:portal.php');
}
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Gestion de matériel IMAC</title>
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
          <?php include 'side-menu-etudiants.php'; ?>
           <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
               <h1 class="page-header">Mon panneau d'informations</h1>
               <h2>Rendez-vous à venir</h2>
               <div class="table-responsive">
                   <table class="table table-striped table-hover">
                       <thead>
                           <tr>
                               <th>Date</th>
                               <th>Réservation</th>
                               <th>Type</th>
                               <th>Actions</th>
                           </tr>
                      </thead>
                       <tbody>
                           <tr>
                               <td>Lundi 02/02/2015 à 10h30</td>
                               <td>8C12234QR3</td>
                               <td>Retrait</td>
                               <td><button class="btn btn-default">Consulter</button></td>
                           </tr>
                           <tr>
                               <td>Mercredi 04/02/2015 à 15h55</td>
                               <td>8C12234QR3</td>
                               <td>Retour</td>
                               <td><button class="btn btn-default">Consulter</button></td>
                           </tr>
                       </tbody>
                   </table>
               </div>
               <h2>Réservations en cours</h2>
               <table class="table table-striped table-hover">
                   <thead>
                       <tr>
                           <th>Date de demande</th>
                           <th>Emprunteur</th>
                           <th>Type de projet</th>
                           <th>Référence</th>
                           <th>Début</th>
                           <th>Fin</th>
                           <th>Actions</th>
                       </tr>
                       <tbody>
                           <tr>
                               <td>24/01/2015</td>
                               <td>Juliette Belin</td>
                               <td>Projet Audiovisuel</td>
                               <td>4A72C39F81</td>
                               <td>29/01/2015</td>
                               <td>03/02/2015</td>
                               <td><button class="btn btn-default">Consulter</button></td>
                           </tr>
                       </tbody>
                   </thead>
               </table>
               <h2>Réservations validées</h2>
              <table class="table table-striped table-hover">
                   <thead>
                       <tr>
                           <th>Date de demande</th>
                           <th>Emprunteur</th>
                           <th>Type de projet</th>
                           <th>Référence</th>
                           <th>Début</th>
                           <th>Fin</th>
                           <th>Actions</th>
                       </tr>
                       <tbody>
                           <tr>
                               <td>28/01/2015</td>
                               <td>Andréas Pinbouen</td>
                               <td>Projet Exceptionnel</td>
                               <td>8C12234QR3</td>
                               <td>02/02/2015</td>
                               <td>04/02/2015</td>
                               <td>
                                   <button class="btn btn-default">Consulter</button>
                                   <button class="btn btn-danger">Annuler</button>
                               </td>
                           </tr>
                       </tbody>
                   </thead>
               </table>
               <h2>Réservations en attente</h2>
               Aucune réservation en attente
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