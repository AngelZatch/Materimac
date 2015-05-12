<?php
session_start();
require_once 'settings/db_connect.php';
require_once 'functions/etudiants.php';

$data = $_GET['nom'];
$row = mysqli_fetch_assoc(fetchEtudiant($data));
$annee = $row['promotion_id'];
?>


<html>
<head>
    <meta charset="UTF-8">
    <title>Modifier un étudiant</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/admin-student.css">
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
               <div class="page-header">
                   <h1><?php echo $row['prenom'] . " " . $row['nom']?></h1>
                   <div class="information">
                       <?php
                            if($row['valide'] == '1') echo '<span class="label label-success">Valide</span>';
                            else echo '<span class="label label-danger">En attente de validation</span>';
                        ?>
                   </div>
               </div>
               <a href="etudiant_liste.php?annee=<?php echo $annee;?>">
                   <button class="btn btn-default">
                       <span class="glyphicon glyphicon-chevron-left"></span>
                       Retour à la liste des étudiants
                   </button>
               </a>
               <h2>Informations</h2>
                <fieldset>
                    <form action="edit_etudiant.php" method="post">
                           <input type="hidden" name="identifiant" value="<?php echo $row['identifiant'];?>">
                        
                              <div class="form-group">
                                <label class="control-label" for="prenom">Prénom</label>
                                <input class="form-control" type="text" name ="prenom" value="<?php echo $row['prenom'];?>">
                                <br>
                                <label class="control-label" for="nom">Nom</label>
                                <input class="form-control" type="text" name="nom" value="<?php echo $row['nom'];?>">
                                <br>
                                <label class="control-label" for="numero_etudiant">Numéro étudiant</label>
                                <input class="form-control" type="text" name="numero_etudiant" value="<?php echo $row['numero_etudiant'];?>">
                                <br>
                                <label class="control-label" for="formation">Formation</label>
                                <select class="form-control" name="formation" id="">
                                    <option value="1">IMAC</option>
                                    <option value="2">IR</option>
                                </select>
                                <br>
                                <label for="promotion" class="control-label">Promotion</label>
                                <?php fetchPromotion($annee); ?>
                                <br>
                                <input class="btn btn-primary" type="submit" value="Valider les changements" name="submitChange">
                                <!--<input class="btn btn-default" type="submit" value="Annuler les changements" name="cancelChange">-->
                    </form>
                </fieldset>
                <h2>Activité</h2>
                <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="col-sm-2">Référence</th>
                            <th class="col-sm-2">Projet</th>
                            <th class="col-sm-2">Promotion</th>
                            <th class="col-sm-1">Retrait</th>
                            <th class="col-sm-1">Dépôt</th>
                            <th class="col-sm-1">Retard</th>
                            <th class="col-sm-3">Actions</th>
                        </tr>
                    </thead>
                </table>
                <h3>Demandes en attente</h3>
                <table class="table table-striped">
                    <tr>
                        <td class="col-sm-2">9KL85H7A9B</td>
                        <td class="col-sm-2">Projet Enseignant</td>
                        <td class="col-sm-2">IMAC 2016</td>
                        <td class="col-sm-1">26/01/2015</td>
                        <td class="col-sm-1">28/01/2015</td>
                        <td class="col-sm-1">Aucun</td>
                        <td class="col-sm-3">
                            <button class="btn btn-primary">Valider</button>
                            <button class="btn btn-default">Consulter</button>
                            <button class="btn btn-danger">Refuser</button>
                        </td>
                    </tr>
                </table>
                <h3>Demandes validées</h3>
                <table class="table table-striped">
                    <tr>
                        <td class="col-sm-2">9KL85H7A9B</td>
                        <td class="col-sm-2">Normal</td>
                        <td class="col-sm-2">IMAC 2016</td>
                        <td class="col-sm-1">26/01/2015</td>
                        <td class="col-sm-1">28/01/2015</td>
                        <td class="col-sm-1">Aucun</td>
                        <td class="col-sm-3">
                            <button class="btn btn-default">Consulter</button>
                            <button class="btn btn-danger">Refuser</button>
                        </td>
                    </tr>
                </table>
                <h3>Emprunts en cours</h3>
                <h3>Emprunts terminés</h3>
                <table class="table table-striped">
                    <tr>
                        <td class="col-sm-2">8LK544LH3</td>
                        <td class="col-sm-2">Projet enseignant</td>
                        <td class="col-sm-2">IMAC 2016</td>
                        <td class="col-sm-1">26/01/2015</td>
                        <td class="col-sm-1">28/01/2015</td>
                        <td class="col-sm-1">Aucun</td>
                        <td class="col-sm-3">
                            <button class="btn btn-default">Consulter</button>
                        </td>
                    </tr>
                    <tr class="danger">
                        <td class="col-sm-2">8LK544LH3</td>
                        <td class="col-sm-2">Projet enseignant</td>
                        <td class="col-sm-2">IMAC 2016</td>
                        <td class="col-sm-1">26/01/2015</td>
                        <td class="col-sm-1">28/01/2015</td>
                        <td class="col-sm-1"><label for="" class="label label-danger">2 jours</label></td>
                        <td class="col-sm-3">
                            <button class="btn btn-default">Consulter</button>
                        </td>
                    </tr>
                </table>
                </div>
            </div>
        </div>
    </div>
        
    <<script src="js/jquery-1.11.2.min.js"></script>
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