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
    <title></title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/fonts.css">
</head>
<body>
   <?php include 'nav.php'; ?>
   <div class="container-fluid">
      <div class="row">
          <?php if($_SESSION['power'] == "1") include 'side-menu.php';
                if($_SESSION['power'] == "2") include 'side-menu-etudiants.php';?>
           <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
               <h1 class="page-header"><span class="glyphicon glyphicon-user"></span> Mon compte</h1>
           </div>
           </div>
      </div>
    </div>
    
    <script src="js/jquery-1.11.2.min.js"></script>
    <script src="js/jquery-ui-1.11.2/jquery-ui.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>