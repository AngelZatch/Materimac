<?php
session_start();
require_once 'settings/db_connect.php';
require_once 'functions/etudiants.php';
if(!isset($_SESSION['power'])){
	header('Location:portal.php');
}
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
               <div class="menu-bar">
                    <ul class="nav nav-pills" id="promotions">
                        <li role="presentation" class="active"><a href="#">Tous</a></li>
                        <li role="presentation"><a href="#">Valides</a></li>
                        <li role="presentation"><a href="#">En attente</a></li>
                    </ul>
                   <div class="btn-toolbar">
                        <a href="etudiant_ajout.php?annee=<?php echo $data;?>" data-title="Ajouter un étudiant" data-toggle="lightbox" data-gallery="remoteload">
                           <button class="btn btn-primary">
                               <span class="glyphicon glyphicon-plus"></span>
                               Ajouter un étudiant
                           </button>
                        </a>
                    </div>
                </div>
                <br><br>
               <div class="table-responsive">
                   <table class="table table-striped table-hover">
                       <thead>
                           <tr>
                               <th class="col-sm-3">Prénom</th>
                               <th class="col-sm-2">Nom</th>
                               <th class="col-sm-2">Numéro d'étudiant</th>
                               <th class="col-sm-2">Statut</th>
                               <th class="col-sm-3">Actions</th>
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
        <script src="js/ekko-lightbox.min.js"></script>
    <script>
            $(document).ready(function ($) {
                // delegate calls to data-toggle="lightbox"
                $(document).delegate('*[data-toggle="lightbox"]:not([data-gallery="navigateTo"])', 'click', function(event) {
                    event.preventDefault();
                    return $(this).ekkoLightbox({
                        onShown: function() {
                            if (window.console) {
                                return console.log('Checking our the events huh?');
                            }
                        },
						onNavigate: function(direction, itemIndex) {
                            if (window.console) {
                                return console.log('Navigating '+direction+'. Current item: '+itemIndex);
                            }
						}
                    });
                });
            });
    </script>
</body>
</html>