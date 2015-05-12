<?php
session_start();
require_once 'settings/db_connect.php';
require_once 'functions/etudiants.php';
include 'functions/categorie.php';
include 'functions/materiel.php';
if(!isset($_SESSION['power'])){
	header('Location:portal.php');
}

$categorieMenu = getCategorie();
$materielTous = getMateriel();
?>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/materiel.css">
</head>
<body>
   <?php include 'nav.php'; ?>
   <div class="container-fluid">
      <div class="row">
           <div class="col-sm-9 col-sm-offset-2 col-md-8 col-md-offset-2 main">
			<!--Nav catégories-->
           <nav class="navbar navbar-default">
           	<div class="container-fluid">
           		<div class="collapse navbar-collapse">
           			<ul class="nav navbar-nav navbar-sec">
           			    <li><a class="navbar-sec-selected" href="#">Tous</a></li>
           				<?php
							while($categorieListe = mysqli_fetch_assoc($categorieMenu)) {
								$cat_nom = $categorieListe['nom'];
								$cat_id = $categorieListe['id'];
								?>
							<li><a href="#"><?php echo $cat_nom;?></a></li>
							<?php } ?>
           			</ul>
           		</div>
           	</div>
           </nav>
           <!--Display du matériel-->
           <?php
			while($materielListe = mysqli_fetch_assoc($materielTous)) {
				$mat_nom = $materielListe['nom'];
				$mat_description = $materielListe['reference'];
                $mat_id = $materielListe['id'];
                $image = mysqli_fetch_assoc(fetchImage($mat_id));
			?>
			<div class="col-md-3">
           	<div class="thumbnail">
           		<div class="caption">
           			<h3><a href="materiel_affichage.php?id=<?php echo $mat_id; ?>"><?php echo $mat_nom; ?></a></h3>
           			<img class="home_disp" src="ressources/images/<?php echo $image['adresse']; ?>" alt="">
           			<div class="row">
                        <div class="col-md-5"><button style="margin-left:25px;" class="btn btn-default"><a href="materiel_affichage.php?id=<?php echo $mat_id; ?>">Voir les détails</a></button></div>
           			    <div class="col-md-7"><button style="margin-left:10px;" class="btn btn-primary" value="<?php echo $mat_id; ?>" onclick="ajouterMateriel(this)">Ajouter au panier</button></div>
           			</div>
           		</div>
           		</div>
           	</div>
			<?php
			}
			   ?>
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