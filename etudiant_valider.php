<?php
session_start();
require_once 'settings/connection.php';
require_once 'functions/etudiants.php';
?>


<html>
<head>
    <meta charset="UTF-8">
    <title>Etudiants à valider</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/dashboard.css">
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
</body>
</html>