<?php
    /********* AFFICHAGE DE L'INVENTAIRE **********/
    require_once 'settings/db_connect.php' ;
    include 'functions/materiel.php';
    include 'functions/set.php';
    include 'functions/set_mat_common.php';

    $materiels = getMateriel();
    $sets = getSet();
?>


<html>
    <head>
        <title>Page de test Inventaire</title>
    </head>
    <body>
      <ul>
      <li><a href="materiel_ajout.php">Ajouter du matériel seul</a></li>
      <li><a href="categorie_display.php">Gérer les catégories</a></li>
      <li><a href="set_ajout.php">Ajouter un set</a></li>
      </ul>
       
        <table style="margin-top:50px;">
            <tr>
                <th>Nom du matériel</th>
                <th>Référence</th>
                <th>N° CN</th>
                <th>État</th>
                <th>Disponibilité</th>
                <th>Notes</th>
                <th></th>
            </tr>
                <?php
                    while($materiel = mysqli_fetch_assoc($materiels)) {
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
                        <td><?php echo "<a href='materiel_edit.php?id=" . $id . "'>" . $nom . "</a>"; ?></td>
                        <td><?php echo $reference; ?></td>
                        <td><?php echo $num_cn; ?></td>
                        <td><?php echo $etat; ?></td>
                        <td><?php echo $dispo; ?></td>
                        <td><?php echo $note; ?></td>
                        <td>
                            <form method="post" action="inventaire.php">
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                <input type="submit" value="Supprimer" name="deleteMateriel">
                            </form>
                        </td>
                    </tr>
                <?php
                    }
                ?>
        </table>
        
        <table style="margin-top:50px;">
            <tr>
                <th>Nom du set</th>
                <th>Disponibilité</th>
                <th>Catégorie</th>
                <th></th>
            </tr>
                <?php
                    while($set = mysqli_fetch_assoc($sets)) {
                        $id = $set['id'];
                        $nom = $set['nom'];
                        $dispo_set = mysqli_fetch_assoc(fetchDispo($set['disponibilite_id']));
                        $dispo = $dispo_set['nom'];
                ?>
                    <tr>
                        <td><?php echo "<a href='set_edit.php?id=" . $id . "'>" . $nom . "</a>"; ?></td>
                        <td><?php echo $reference; ?></td>
                        <td><?php echo $num_cn; ?></td>
                        <td><?php echo $dispo; ?></td>
                        <td><?php echo $note; ?></td>
                        <td>
                            <form method="post" action="inventaire.php">
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                <input type="submit" value="Supprimer" name="deleteSet">
                            </form>
                        </td>
                    </tr>
                <?php
                    }
                ?>
        </table>
    </body>
</html>