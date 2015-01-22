<?php
require_once 'settings/connection.php';
include 'functions/etudiants.php';

?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Liste des Etudiants</title>
</head>
<body>
    <h1> Promotion 2016 </h1>
    <?php afficherEtudiants() ?>
    
</body>
</html>