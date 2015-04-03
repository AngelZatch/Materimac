<?php
session_start();
require_once 'settings/connection.php';

if(!isset($_SESSION['power'])){
	header('Location:portal.php');
}
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Planning des réservations</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/dashboard.css">
</head>
<body>
    <?php include 'nav.php'; ?>
   <div class="container-fluid">
      <div class="row">
          <?php include 'side-menu.php'; ?>
           <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
               <h1 class="page-header">Planning des réservations</h1>
           </div>
      </div>
    </div>
    
    <script src="js/jquery-1.11.2.min.js"></script>
    <script src="js/jquery-ui-1.11.2/jquery-ui.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>