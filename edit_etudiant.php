<?php
require_once 'settings/connection.php';
include 'functions/etudiants.php';

$row = mysqli_fetch_assoc(fetchEtudiant());
?>


<html>
<head>
    <meta charset="UTF-8">
    <title>Modifier un étudiant</title>
</head>
<body>
    <h1>Modifier <?php echo $row['prenom'] . " " . $row['nom']?></h1>
    <fieldset>
        <form action="edit_etudiant.php" method="post">
            <ul>
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
</body>
</html>