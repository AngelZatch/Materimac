<?php
require_once 'lib/config.php';

$result = $bdd->query('SELECT prenom, nom, numero_etudiant FROM etudiant WHERE etudiant.nom=\'Pinbouen\'');

while($data = $result->fetch())
{
?>
    <p> Modifier <?php echo $data['prenom'] . " " . $data['nom'];?> </p>
    <fieldset>
        <form action="./" method="post">
            <ul>
                <li>
                    <label for="prenom">Pr&eacute;nom :</label>
                    <input type="text" name="prenom" id="prenom" value="<?php echo $data['prenom'];?>"/>
                </li>
                <li>
                    <label for="nom">Nom :</label>
                    <input type="text" name="nom" id="nom" value="<?php echo $data['nom'];?>"/>
                </li>
                <li>
                    <label for="numero_etudiant">Num&eacute;ro Etudiant :</label>
                    <input type="text" name="numero_etudiant" id="numero_etudiant" value="<?php echo $data['numero_etudiant'];?>"/>
                </li>
            </ul>
        </form>
        <input type="submit" value="Valider les changements">
    </fieldset>
<?php
}

$req = $bdd->prepare('INSERT INTO etudiant (prenom, nom, numero_etudiant), VALUES(?, ?, ?)');
$req->execute(array($_POST['prenom'], $_POST['nom'], $_POST['numero_etudiant']));

$result->closeCursor();
?>