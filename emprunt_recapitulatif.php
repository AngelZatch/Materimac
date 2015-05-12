<?php
session_start();
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Gestion de matériel IMAC</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/fonts.css">
</head>
<body>
    <?php include 'nav.php'; ?>
   <div class="container-fluid">
      <div class="row">
          <?php include 'side-menu-etudiants.php'; ?>
           <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
               <h1 class="page-header">Récapitulatif</h1>
               <h3>Emprunteur : Pauline Bocognano</h3>
               <h3>Date de début : 02/02/2015</h3>
               <h3>Date de fin : 04/02/2015</h3>
               <h3>Membres du groupe :<input type="text" class="form-control" placeholder="Rechercher un étudiant..." style="width:50%;"></h3>
               <h3>Raison de l'emprunt : <input type="text"></h3>
               <a href="etudiant_dashboard.php" class="btn btn-success">Valider la demande</a>
               <button class="btn btn-warning">Retourner à la sélection</button>
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