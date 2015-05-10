<?php
session_start();
require_once 'settings/db_connect.php';
require_once 'functions/f_reservations.php';

if(!isset($_SESSION['power'])){
	header('Location:portal.php');
}
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
           <div class="col-sm-9 col-sm-offset-3 col-md-8 col-md-offset-2 main">
               <h1 class="page-header"><span class="glyphicon glyphicon-home"></span> Local</h1>
               <div class="table-responsive">
               	<?php afficherEmpruntsProches();?>
               </div>
           </div>
      </div>
    </div>
    
    <script src="js/jquery-1.11.2.min.js"></script>
    <script src="js/jquery-ui-1.11.2/jquery-ui.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jquery.collapse.js"></script>
</body>
</html>