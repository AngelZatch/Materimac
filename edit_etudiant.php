<?php
require_once 'settings/connection.php';
include 'functions/etudiants.php';

$data = $_GET['nom'];
$row = mysqli_fetch_assoc(fetchEtudiant($data));
?>


<html>
<head>
    <meta charset="UTF-8">
    <title>Modifier un étudiant</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/dashboard.css">
</head>
<body>
       <?php include 'nav.php'; ?>
    <div class="container-fluid">
        <div class="row">
            <?php include 'side-menu.php'; ?>
           <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <h1 class="page-header">Modifier <?php echo $row['prenom'] . " " . $row['nom']?></h1>
    <fieldset>
        <form action="edit_etudiant.php" method="post">
            <ul>
               <li>
                   <input type="hidden" name="identifiant" value="<?php echo $row['identifiant'];?>">
               </li>
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
            </ul>
            <input type="submit" value="Valider" name="submitChange">
        </form>
    </fieldset>
           </div>
        </div>
    </div>
        
    <script src="js/jquery-1.11.2.min.js"></script>
    <script src="js/jquery-ui-1.11.2/jquery-ui.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>

</body>
</html>