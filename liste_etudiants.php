<?php
require_once 'settings/connection.php';
require_once 'functions/etudiants.php';

$data = $_GET['annee'];
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
               <h1 class="page-header">Promotion IMAC <?php echo $data;?></h1>
                <a href="materiel_ajout.php">
                   <button class="btn btn-primary">
                       <span class="glyphicon glyphicon-plus"></span>
                       Ajouter un étudiant
                   </button>
                </a>
                <!--<ul class="nav nav-pills" id="promotions">
                    <li role="presentation" class="active"><a href="#">IMAC 1</a></li>
                    <li role="presentation"><a href="#">IMAC 2</a></li>
                    <li role="presentation"><a href="#">IMAC 3</a></li>
                </ul>-->
                <br><br>
               <div class="table-responsive">
                   <table class="table table-striped table-hover">
                       <thead>
                           <tr>
                               <th>Prénom</th>
                               <th>Nom</th>
                               <th>Numéro d'étudiant</th>
                               <th>Actions</th>
                           </tr>
                       </thead>
                           <?php afficherEtudiants($data) ?>    
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