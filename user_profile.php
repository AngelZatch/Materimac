<?php
session_start();
require_once 'settings/db_connect.php';
require_once 'functions/etudiants.php';

if(!isset($_SESSION['power'])){
	header('Location:portal.php');
}

if($_SESSION['power'] == "1") $data = $_SESSION['gestionnaire'];
if($_SESSION['power'] == "2") $data = $_SESSION['etudiant'];
$row = mysqli_fetch_assoc(fetchInfos($data, $_SESSION['power']));
?>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="apple-touch-icon" sizes="57x57" href="icons/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="icons/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="icons/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="icons/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="icons/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="icons/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="icons/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="icons/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="icons/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="icons/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="icons/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="icons/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="icons/favicon-16x16.png">
	<link rel="manifest" href="icons/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="icons/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">
</head>
<body>
   <?php include 'nav.php'; ?>
   <div class="container-fluid">
      <div class="row">
          <?php if($_SESSION['power'] == "1") include 'side-menu.php';
                if($_SESSION['power'] == "2") include 'side-menu-etudiants.php';?>
           <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
               <h1 class="page-header"><span class="glyphicon glyphicon-user"></span> Mon compte</h1>
               <fieldset>
               	<form action="user_profile.php">
               		<div class="form-group">
               			<label for="prenom" class="control-label">Prénom</label>
               			<input type="text" class="form-control" name="prenom" value="<?php echo $row['prenom'];?>">
               			<br>
               			<label for="nom" class="control-label">Nom</label>
               			<input type="text" class="form-control" name="nom" value="<?php echo $row['nom'];?>">
               			<br>
						<?php if($_SESSION['power'] == "2") {
						echo '<label for="numero_etudiant" class="control-label">Numéro étudiant</label>
               			<input type="text" class="form-control" name="numero_etudiant value="'.$row['numero_etudiant'].'">
               			<br>
               			<label for="formation" class="control-label">Formation</label>
               			<select name="formation" id="" class="form-control">
               				<option value="1">IMAC</option>
               				<option value="2">IR</option>
               				<option value="3">IG</option>
               			</select>
               			<br>
               			<label for="promtion" class="control-label">Promotion</label>';
						fetchPromotion($row['promotion_id']);
						echo '<br>';}
             			?>
              			<input type="submit" class="btn btn-primary" value="Valider les changements">
               		</div>
               	</form>
               </fieldset>
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