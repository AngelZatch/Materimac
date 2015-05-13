<?php
session_start();
require_once 'settings/db_connect.php';
include 'functions/recherche.php';
include 'functions/set.php';
include 'functions/categorie.php';
include 'functions/materiel.php';
include 'functions/etudiants.php';
include 'functions/set_mat_common.php';
include 'functions/labels.php';

$data = $_GET['recherche'];
$search_materiel = rechercherMateriel($data);
//$search_sets = rechercherSet($data);
//$search_etudiant = rechercherEtudiant($data);
$categories = getCategorie();
?>

<html>
<head>
    <meta charset="UTF-8">
    <title>Résultats de la recherche</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/materiel.css">
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
          <?php 
			if($_SESSION['power'] == 1) { require_once 'side-menu.php'; }
		  	else if($_SESSION['power'] == 2 ) { require_once 'side-menu-etudiants.php'; }
		  ?>
           <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
               <h1 class="page-header">Résultats de la recherche</h1>
               
               <h3>Recherche de matériels</h3>
               <?php if($_SESSION['power'] == 1) { ?>
               <div class="table-responsive">
              		<div class="panel panel-default">
                            <table class="table table-striped table-hover">   
                                <thead>
                                    <tr class="row">
                                        <th class="col-sm-2">Nom Produit</th>
                                        <th class="col-sm-2">Référence</th>
                                        <th class="col-sm-1">n°CN</th>
                                        <th class="col-sm-1">Disponibilités</th>
                                        <th class="col-sm-1"></th>
                                        <th class="col-sm-2">Notes</th>
                                        <th class="col-sm-2">Actions</th>
                                    </tr>
                                </thead>

                                <tbody class="table table-striped">

                                <tbody class="table table-striped">
                               <?php
                                    while($search_mat = mysqli_fetch_assoc($search_materiel)) {
                                        $id = $search_mat['id'];
                                        $nom = $search_mat['nom'];
                                        $reference = $search_mat['reference'];
                                        $num_cn = $search_mat['numero_cn'];
                                        $etat_materiel = mysqli_fetch_assoc(fetchEtat($search_mat['etat_id']));
                                        $etat = $etat_materiel['nom'];
                                        $dispo_materiel = mysqli_fetch_assoc(fetchDispo($search_mat['disponibilite_id']));
                                        $dispo = $dispo_materiel['nom'];
                                        $note = $search_mat['note'];
                               ?>
                                       <tr class="row">
                                        <td class="col-sm-2"><?php echo $nom; ?></td>
                                        <td class="col-sm-2"><?php echo $reference; ?></td>
                                        <td class="col-sm-1"><?php echo $num_cn; ?></td>
                                        <td class="col-sm-1"><?php labelDispo($dispo); ?></td>
                                        <td class="col-sm-1"><?php// echo $etat; ?></td>
                                        <td class="col-sm-2"><?php echo $note; ?></td>
                                        <td class="col-sm-2">
                                            <form action="materiel_liste.php" method="post">  
										  		<div class="btn btn-group">
													<a href="materiel_edit.php?id='<?php echo $id?>'" role="button" class="btn btn-default" data-title="Modifier un matériel" data-toggle="lightbox" data-gallery="remoteload"><span class="glyphicon glyphicon-edit"></span> Modifier</a>
													<button type="submit" name="deleteMateriel" class="btn btn-default"><span class="glyphicon glyphicon-trash"></span> Supprimer</button>
												</div>
                                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                            </form>
                                        </td>
                                    </tr>
                                    </tbody>
                            </table>

                        </div>
                        <?php
                            }
                        ?>
                    </div>
                                    
                           <?php
                                } else if($_SESSION['power'] == 2) {
			  						$i = 0;$j = 1;
									while($materielListe = mysqli_fetch_assoc($search_materiel)) {
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
		  						}
                            ?>
               </table>
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