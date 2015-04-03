<?php
session_start();
require_once 'settings/connection.php';
include 'functions/etudiants.php';
include 'functions/materiel.php';
include 'functions/categorie.php';
include 'functions/set.php';
include 'functions/set_mat_common.php';
include 'functions/labels.php';

$materiels1 = getMateriel();
$materiels2 = getMateriel();
$sets = getSet();
$categories1 = getCategorie();
$categories2 = getCategorie();
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Liste du Matériel</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/ekko-lightbox.css">
</head>
<body>
    <?php include 'nav.php'; ?>
    <div class="container-fluid">
        <div class="row">
            <?php include 'side-menu.php'; ?>
           <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
               <h1 class="page-header">Inventaire de Matériel</h1>
               <a href="materiel_ajout.php" data-title="Ajouter du matériel" data-toggle="lightbox" data-gallery="remoteload">
                   <button class="btn btn-primary">
                       <span class="glyphicon glyphicon-plus"></span>
                       Ajouter du matériel
                   </button>
               </a>
               <a href="set_ajout.php" data-title="Ajouter un set" data-toggle="lightbox" data-gallery="remoteload">
                   <button class="btn btn-primary">
                   <span class="glyphicon glyphicon-plus"></span>
                   Ajouter un set
                   </button>
               </a>
               <div class="row">
                   <div class="col-md-4">
                       <h2>Catégories</h2>
                       <?php 
                            while($categorie = mysqli_fetch_assoc($categories1)) {
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
                        while($categorie = mysqli_fetch_assoc($categories2)) {
                   ?>
                     <?php 
                            if($categorie['nom'] != "Set vidéo") {
                       ?>
                         <div class="panel panel-default">
                         <div class="panel-heading"><h3 class="panel-title"><?php echo $categorie['nom']; ?></h3></div>
                           <table class="table table-striped table-hover">
                               <thead>
                                   <tr>
                                       <th class="col-sm-2">Nom Produit</th>
                                       <th class="col-sm-3">Référence</th>
                                       <th class="col-sm-1">n°CN</th>
                                       <th class="col-sm-1">Etat</th>
                                       <th class="col-sm-1">Disponibilité</th>
                                       <th class="col-sm-2">Notes</th>
                                       <th class="col-sm-2">Actions</th>
                                   </tr>
                               </thead>
                               <?php
                                    while($materiel = mysqli_fetch_assoc($materiels1)) {
                                        if($materiel['set_id'] == 0 && $materiel['categorie_id'] == $categorie['id']){ 
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
                                           <td class="col-sm-3"><?php echo $reference; ?></td>
                                           <td class="col-sm-1"><?php echo $num_cn; ?></td>
                                           <td class="col-sm-1"><?php echo $etat; ?></td>
                                           <td class="col-sm-1"><?php labelDispo($dispo) ?></td>
                                           <td class="col-sm-2"><?php echo $note; ?></td>
                                           <td class="col-sm-2">
                                               <form method="post" action="liste-materiel.php">
                                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                                <div class="btn-group">
                                                    <a href="materiel_edit.php?id='<?php echo $id?>'" data-title="Modifier un matériel" data-toggle="lightbox" data-gallery="remoteload">
                                                        <button type="button" class="btn btn-default">
                                                           <span class="glyphicon glyphicon-edit"></span>
                                                           Modifier 
                                                        </button>
                                                   </a>
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
                               ?>
                           </table>
                           </div>
                    <?php
                            } else {
                    ?>
                            <div class="panel panel-default">
                                <div class="panel-heading"><h3 class="panel-title"><?php echo $categorie['nom']; ?></h3></div>
                               <table class="table table-striped table-hover">
                                   <thead>
                                       <tr>
                                           <th class="col-sm-2">Nom Produit</th>
                                           <th class="col-sm-3">Référence</th>
                                           <th class="col-sm-1">n°CN</th>
                                           <th class="col-sm-1">Etat</th>
                                           <th class="col-sm-1">Disponibilité</th>
                                           <th class="col-sm-2">Notes</th>
                                           <th class="col-sm-2">Actions</th>
                                       </tr>
                                   </thead>
                                   <?php
                                        while($set = mysqli_fetch_assoc($sets)) {
                                            $set_id = $set['id'];
                                            $set_nom = $set['nom'];
                                            $dispo_set = mysqli_fetch_assoc(fetchDispo($set['disponibilite_id']));
                                            $set_dispo = $dispo_set['nom'];
                                    ?>
                                            <tbody class="table table-striped">
                                               <tr style="background-color:#e8e8e8;">
                                                   <td class="col-sm-2"><a href="set_edit.php?id=<?php echo $set_id; ?>"><?php echo $set_nom; ?></a></td>
                                                   <td class="col-sm-3"></td>
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
                                            while($materiel = mysqli_fetch_assoc($materiels2)) {
                                                if($materiel['set_id'] == $set_id){ 
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
                                                   <td class="col-sm-3"><?php echo $reference; ?></td>
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
                                    ?>
                                   </tbody>
                                   <?php
                                            }
                                        }
                                   ?>
                               </table>
                               </div>
                    <?php
                            }
                        }
                    ?>
                    <!-- hidden elements -->
                    <div id="cBoxOverlay" style="display:none;"></div>
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
                $(document).delegate('*[data-toggle="lightbox"]:not([data-gallery="navigateTo"])', 'click', function(event) {
                    event.preventDefault();
                    return $(this).ekkoLightbox({
                        onShown: function() {
                            if (window.console) {
                                return console.log('Checking our the events huh?');
                            }
                        },
						onNavigate: function(direction, itemIndex) {
                            if (window.console) {
                                return console.log('Navigating '+direction+'. Current item: '+itemIndex);
                            }
						}
                    });
                });
            });
    </script>
</body>
</html>