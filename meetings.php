<?php
require_once 'settings/connection.php';
require_once 'functions/etudiants.php';

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
               <h1 class="page-header">Vos rendez-vous</h1>
               <div class="col-sm-1">
                  <li class="list-group-item"></li>
                   <li class="list-group-item">10h30</li>
                   <li class="list-group-item">10h35</li>
                   <li class="list-group-item">10h40</li>
                   <li class="list-group-item">15h45</li>
                   <li class="list-group-item">15h50</li>
                   <li class="list-group-item">15h55</li>
                   <li class="list-group-item"></li>
               </div>
               <div class="col-sm-2">
                   <ul class="list-group">
                       <li class="list-group-item">LUNDI 19</li>
                       <li class="list-group-item"></li>
                       <li class="list-group-item"></li>
                       <li class="list-group-item"></li>
                       <li class="list-group-item"></li>
                       <li class="list-group-item">Andréas Pinbouen</li>
                       <li class="list-group-item"></li>
                       <li class="list-group-item"></li>
                   </ul>
               </div>
               <div class="col-sm-2">
                   <ul class="list-group">
                       <li class="list-group-item">MARDI 20</li>
                       <li class="list-group-item">Robin Lasne</li>
                       <li class="list-group-item">Mélissa Masquelier-Costa</li>
                       <li class="list-group-item">Juliette Belin</li>
                       <li class="list-group-item"></li>
                       <li class="list-group-item"></li>
                       <li class="list-group-item"></li>
                       <li class="list-group-item"></li>
                   </ul>
               </div>
               <div class="col-sm-2">
                   <ul class="list-group">
                       <li class="list-group-item">MERCREDI 21</li>
                       <li class="list-group-item">Pauline Bocognano</li>
                       <li class="list-group-item"></li>
                       <li class="list-group-item"></li>
                       <li class="list-group-item"></li>
                       <li class="list-group-item"></li>
                       <li class="list-group-item"></li>
                       <li class="list-group-item"></li>
                   </ul>
               </div>
               <div class="col-sm-2">
                   <ul class="list-group">
                       <li class="list-group-item">JEUDI 22</li>
                       <li class="list-group-item"></li>
                       <li class="list-group-item"></li>
                       <li class="list-group-item"></li>
                       <li class="list-group-item"></li>
                       <li class="list-group-item"></li>
                       <li class="list-group-item"></li>
                       <li class="list-group-item"></li>
                   </ul>
               </div>
               <div class="col-sm-2">
                   <ul class="list-group">
                       <li class="list-group-item">VENDREDI 23</li>
                       <li class="list-group-item"></li>
                       <li class="list-group-item"></li>
                       <li class="list-group-item"></li>
                       <li class="list-group-item"></li>
                       <li class="list-group-item"></li>
                       <li class="list-group-item"></li>
                       <li class="list-group-item"></li>
                   </ul>
               </div>
           </div>
        </div>
    </div>
    
    <script src="js/jquery-1.11.2.min.js"></script>
    <script src="js/jquery-ui-1.11.2/jquery-ui.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>