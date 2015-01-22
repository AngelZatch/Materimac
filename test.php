<?php
require_once 'lib/config.php';

$result = $bdd->query('SELECT prenom, nom, numero_etudiant, identifiant FROM etudiant WHERE etudiant.identifiant=\'apinboue\'');

while($data = $result->fetch())
{
    $id = $data['identifiant'];
    $prenom = $data['prenom'];
    $nom = $data['nom'];
    $num = $data['numero_etudiant'];
?>
    <p> Modifier <?php echo $prenom . " " . $nom . " (" . $id . ")";?> </p>
    <fieldset>
        <form action="etudiants.php" method="post">
           <ul>
               <li>
                    <label for="identifiant">Identifiant : </label>
                    <input type="hidden" name="identifiant" id="identifiant" value="<?php echo $id;?>"/>
               </li>
                <li>
                    <label for="prenom">Pr&eacute;nom :</label>
                    <input type="text" name="prenom" id="prenom" value="<?php echo $prenom;?>"/>
                </li>
                <li>
                    <label for="nom">Nom :</label>
                    <input type="text" name="nom" id="nom" value="<?php echo $nom;?>"/>
                </li>
                <li>
                    <label for="numero_etudiant">Num&eacute;ro Etudiant :</label>
                    <input type="text" name="numero_etudiant" id="numero_etudiant" value="<?php echo $num?>"/>
                </li>
            </ul>
            <input type="submit" value="Valider les changements">
        </form>
    </fieldset>
<?php
}
$result->closeCursor();
?>