<?php
require_once 'settings/connection.php';
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
                            if($row['valide'] == '1') echo '<span class="status online"></span> valide';
                            else echo '<span class="status offline"></span> en attente de validation';
                        ?>
                   </div>
               </div>
               <h2>Informations</h2>
                <fieldset>
                    <form action="edit_etudiant.php" method="post">
                        <ul>
                           <input type="hidden" name="identifiant" value="<?php echo $row['identifiant'];?>">
                            <li>
                                <label for="prenom">Prénom</label>
                                <input type="text" name ="prenom" value="<?php echo $row['prenom'];?>">
                                </li>
                            <li>
                                <label for="nom">Nom</label>
                                <input type="text" name="nom" value="<?php echo $row['nom'];?>">
                            </li>
                            <li>
                                <label for="numero_etudiant">Numéro étudiant</label>
                                <input type="text" name="numero_etudiant" value="<?php echo $row['numero_etudiant'];?>">
                            </li>
                            <li>
                                <label for="promotion">Promotion</label>
                                <select name="formation" id="">
                                    <option value="1">IMAC</option>
                                    <option value="2">IR</option>
                                </select>
                                <?php fetchPromotion($annee); ?>
                            </li>
                        </ul>
                        <input class="btn btn-success" type="submit" value="Valider les changements" name="submitChange">
                        <input class="btn btn-warning" type="submit" value="Annuler les changements" name="cancelChange">
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
                            <button class="btn btn-success">Valider</button>
                            <button class="btn btn-warning">Consulter</button>
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
                            <button class="btn btn-warning">Consulter</button>
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
                            <button class="btn btn-warning">Consulter</button>
                        </td>
                    </tr>
                    <tr class="danger">
                        <td class="col-sm-2">8LK544LH3</td>
                        <td class="col-sm-2">Projet enseignant</td>
                        <td class="col-sm-2">IMAC 2016</td>
                        <td class="col-sm-1">26/01/2015</td>
                        <td class="col-sm-1">28/01/2015</td>
                        <td class="col-sm-1">2 jours</td>
                        <td class="col-sm-3">
                            <button class="btn btn-warning">Consulter</button>
                        </td>
                    </tr>
                </table>
                </div>
            </div>
        </div>
    </div>
        
    <script src="js/jquery-1.11.2.min.js"></script>
    <script src="js/jquery-ui-1.11.2/jquery-ui.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>

</body>
</html>