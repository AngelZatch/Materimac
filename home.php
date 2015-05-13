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
            $i = 0;$j = 1;
			while($materielListe = mysqli_fetch_assoc($materielTous)) {
				$mat_nom = $materielListe['nom'];
				$mat_description = $materielListe['reference'];
                $mat_id = $materielListe['id'];
                $image = mysqli_fetch_assoc(fetchImage($mat_id));
                if($i == 0) { ?> <div class="row"> <?php } ?>
			<div class="col-md-3">
           	    <div class="thumbnail">
                    <div class="caption">
                        <h3><a href="materiel_affichage.php?id=<?php echo $mat_id; ?>"><?php echo $mat_nom; ?></a></h3>
                        <img class="home_disp" src="ressources/images/<?php echo $image['adresse']; ?>" alt="">
                        <button class="btn btn-default"><a href="materiel_affichage.php?id=<?php echo $mat_id; ?>">Détails</a></button>
                        <button class="btn btn-primary ajout-panier" id="mat_<?php echo $j; $j++; ?>" value="<?php echo $mat_id; ?>" onclick="ajouterMateriel(this)">Ajouter au panier</button>
                    </div>
           		</div>
           	</div>
               <?php
                $i++;
                if($i == 4) $i = 0;
                if($i == 0) { ?> </div> <?php }
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