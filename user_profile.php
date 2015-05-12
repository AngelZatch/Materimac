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