<?php

session_start();
require_once 'settings/db_connect.php';
include 'functions/etudiants.php';
include 'functions/categorie.php';
include 'functions/set_mat_common.php';
include 'functions/labels.php';

if(!isset($_SESSION['power'])){
	header('Location:portal.php');
}

    $categories = getCategorie();
    $categories2 = getCategorie();
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Liste du Matériel</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/ekko-lightbox.css">
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
            <?php include 'side-menu.php'; ?>
           <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
               <h1 class="page-header"><span class="glyphicon glyphicon-list-alt"></span> Inventaire de Matériel</h1>
               <a href="materiel_ajout.php" data-title="Ajouter du matériel" data-toggle="lightbox" data-gallery="remoteload" role="button" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Ajouter du matériel</a>
               <a href="set_ajout.php" data-title="Ajouter un set" data-toggle="lightbox" data-gallery="remoteload" role="button" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Ajouter un set</a>
               <div class="row">
                        <div class="col-md-4">
                            <h2>Catégories</h2>
                            <?php
                                $list_cat = $categories;
                                while($categorie = mysqli_fetch_assoc($list_cat)) {
                                    $cat_nom = $categorie['nom'];
                                    $cat_id = $categorie['id'];
                            ?>
                            <input type="checkbox" name="<?php echo $cat_id; ?>" id=""><?php echo $cat_nom; ?>
                            <br>
                            <?php
                                }
                            ?>
                            <a class="btn btn-default" href="categorie_display.php">Gérer les catégories</a>
                        </div>
                        <div class="col-md-4">
                            <h2>Disponibilité</h2>
                            <input type="checkbox"> <span class="label label-success">Disponible</span><br>
                            <input type="checkbox"> <span class="label label-warning">Prévu aujourd'hui</span><br>
                            <input type="checkbox"> <span class="label label-danger">Indisponible</span><br>
                            <input type="checkbox"> <span class="label label-info">Gelé</span>
                        </div>
                        <div class="col-md-4">
                            <h2>Etat du matériel</h2>
                            <input type="checkbox" name="" id="">Neuf
                            <br>
                            <input type="checkbox" name="" id="">Très bon état
                            <br>
                            <input type="checkbox" name="" id="">Bon état
                            <br>
                            <input type="checkbox" name="" id="">OK
                            <br>
                            <input type="checkbox" name="" id="">Mauvais état
                            <br>
                            <input type="checkbox" name="" id="">Cassé
                            <br>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <?php
                            $list_cat = $categories2;
                            while($categorie = mysqli_fetch_assoc($list_cat)) {
                        ?>
                        <div class="panel panel-default">
                            <div class="panel-heading"><h3 class="panel-title"><?php echo $categorie['nom']; ?></h3></div>

                            <table class="table table-striped table-hover">   
                                <thead>
                                    <tr>
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

                                    <?php
                                        $sets = getSet();
                                        $materiels = getMateriel();
								// Affichage des sets
                                        while($set = mysqli_fetch_assoc($sets)) {
                                            $set_id = $set['id'];
                                            $set_nom = $set['nom'];
                                            $dispo_set = mysqli_fetch_assoc(fetchDispo($set['disponibilite_id']));
                                            $set_dispo = $dispo_set['nom'];
                                            $set_cat_id = $set['categorie_id'];
                                            if($set_cat_id == $categorie['id']) {
                                                ?>
                                                <tr style="background-color:#e8e8e8;">
                                                   <td class="col-sm-2"><a href="set_edit.php?id=<?php echo $set_id; ?>"><?php echo $set_nom; ?></a></td>
                                                   <td class="col-sm-2"></td>
                                                   <td class="col-sm-1"></td>
                                                   <td class="col-sm-1"></td>
                                                   <td class="col-sm-1"><?php labelDispo($set_dispo) ?></td>
                                                   <td class="col-sm-2"></td>
                                                   <td class="col-sm-2">
                                                       <form method="post" action="liste-materiel.php">
                                                        <input type="hidden" name="id" value="<?php echo $set_id; ?>">
                                                        <div class="btn-group">
                                                           <button type="button" class="btn btn-default">
                                                               <span class="glyphicon glyphicon-edit"></span>
                                                               Modifier 
                                                           </button>
                                                           <button type="button" class="btn btn-default">
                                                               <span class="glyphicon glyphicon-trash"></span>
                                                               Supprimer
                                                           </button>
                                                        </div>
                                                        </form>
                                                   </td>
                                               </tr>
                                                <?php
												// Affichage du matériel d'un set
                                                while($materiel = mysqli_fetch_assoc($materiels)) {
                                                    if($materiel['set_id'] == $set_id) {
                                                        $id = $materiel['id'];
                                                        $nom = $materiel['nom'];
                                                        $reference = $materiel['reference'];
                                                        $num_cn = $materiel['numero_cn'];
                                                        $etat_materiel = mysqli_fetch_assoc(fetchEtat($materiel['etat_id']));
                                                        $etat = $etat_materiel['nom'];
                                                        $note = $materiel['note'];
                                    ?>
                                    <tr>
                                        <td class="col-sm-2"><?php echo "<a href='materiel_edit.php?id=" . $id . "'>" . $nom . "</a>"; ?></td>
                                        <td class="col-sm-2"><?php echo $reference; ?></td>
                                        <td class="col-sm-1"><?php echo $num_cn; ?></td>
                                        <td class="col-sm-1"><?php echo $etat; ?></td>
                                        <td class="col-sm-1"></td>
                                        <td class="col-sm-2"><?php echo $note; ?></td>
                                        <td class="col-sm-2">
                                            <form method="post" action="liste-materiel.php">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-default">
                                                        <span class="glyphicon glyphicon-edit"></span>
                                                        Modifier 
                                                    </button>
                                                    <button type="button" class="btn btn-default">
                                                        <span class="glyphicon glyphicon-trash"></span>
                                                        Supprimer
                                                    </button>
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php
                                                    }
                                                }
                                            } else {
												// Affichage du matériel hors set
                                                while($materiel = mysqli_fetch_assoc($materiels)) {
                                                    if($materiel['categorie_id'] == $categorie['id']){ 
                                                        $id = $materiel['id'];
                                                        $nom = $materiel['nom'];
                                                        $reference = $materiel['reference'];
                                                        $num_cn = $materiel['numero_cn'];
                                                        $etat_materiel = mysqli_fetch_assoc(fetchEtat($materiel['etat_id']));
                                                        $etat = $etat_materiel['nom'];
                                                        $dispo_materiel = mysqli_fetch_assoc(fetchDispo($materiel['disponibilite_id']));
                                                        $dispo = $dispo_materiel['nom'];
                                                        $note = $materiel['note'];
                                    ?>
                                    <tr>
                                        <td class="col-sm-2"><?php echo $nom; ?></td>
                                        <td class="col-sm-2"><?php echo $reference; ?></td>
                                        <td class="col-sm-1"><?php echo $num_cn; ?></td>
                                        <td class="col-sm-1"><?php echo $etat; ?></td>
                                        <td class="col-sm-1"><?php labelDispo($dispo); ?></td>
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
                                   <?php
                                                    }
                                                }
                                            }
                                        }
                                    ?>

                                </tbody>
                            </table>

                        </div>
                        <?php
                            }
                        ?>
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