<?php
require_once 'settings/connection.php';
include 'functions/etudiants.php';

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
           <h2>Gestion globale</h2>
           <div class="alert alert-danger" role="alert"><strong>Attention !</strong> Ces actions sont définitives !</div>
           <p>Supprimer toutes les Attestations de Responsabilité Cilvile</p>
           <p>Supprimer tout l'historique</p>
           <p>Geler tout l'inventaire</p>
           </div>
        </div>
    </div>
    
    <script src="js/jquery-1.11.2.min.js"></script>
    <script src="js/jquery-ui-1.11.2/jquery-ui.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>