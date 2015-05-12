<?php
session_start();
require_once 'settings/db_connect.php';
require_once 'functions/etudiants.php';
if(!isset($_SESSION['power'])){
	header('Location:portal.php');
}
?>


<html>
<head>
    <meta charset="UTF-8">
    <title>Etudiants à valider</title>
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
                <h1 class="page-header">Etudiants à valider</h1>
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Prénom</th>
                                <th>Nom</th>
                                <th>Numéro étudiant</th>
                                <th>Attestation de responsabilité civile</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <?php afficherNonValides(); ?>
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