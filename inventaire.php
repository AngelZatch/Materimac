<?php
    /********* AFFICHAGE DE L'INVENTAIRE **********/
    require_once 'settings/db_connect.php';
    include 'functions/materiel.php';
    include 'functions/set.php';
    include 'functions/panier.php';
    include 'functions/set_mat_common.php';

    $materiels = getMateriel();
    $sets = getSet();
    $panier_items = getPanier();
?>


<html>
    <head>
        <title>Page de test Inventaire</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    </head>
    <body>
     
     <div id="statusResponse"></div>
     
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
                           <button value="<?php echo $id; ?>" onclick="addToBasket(this)">Ajouter au panier</button>
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
                                <input type="submit" value="Ajouter au panier" name="ajouterPanier" onclick="addToBasket(this)">
                            </form>
                        </td>
                    </tr>
                <?php
                    }
                ?>
        </table>
        
        <div>
            <h2>Panier</h2>
            <?php
                while($panier_item = mysqli_fetch_assoc($panier_items)) {
                    $id = $panier_item['id_materiel'];
                    $nom = mysqli_fetch_assoc(fetchMateriel($id))['nom'];
                    ?>
                    <ul>
                        <li>
                            <?php echo $nom; ?>
                            <form class="removeBasket" style="display:inline-block;" method="post">
                                <input type="hidden" name="id" class="item_id" value="<?php echo $id; ?>">
                                <input type="submit" value="Supprimer du panier" class="deletePanierMateriel" name="deletePanierMateriel" onclick="deleteFromBasket">
                            </form>
                        </li>
                    </ul>
                    <?php
                }
            ?>
        </div>
        
        <script>
            function addToBasket(item) {
               // alert(item.value);
                var id = item.value;
                alert(id);
                $.ajax({
                    type: "POST",
                    url: "functions/addbasket.php",
                    data: {id: id},
                    dataType: "html",
                    success: function(msg){
                        // On affiche la réponse
                        $("#statusResponse").html('<span style="color:green">L\'objet a &eacute;t&eacute ajout&eacute; au panier.</span>');
                        setTimeout(rmResponse, 3000);
                    },
                    error: function(msg){
                        // On affiche l'erreur dans la zone de réponse
                        $("#statusResponse").html('<span style="color:orange">Erreur</span>');
                        setTimeout(rmResponse, 3000);
		          }
                });
                function rmResponse() {
                    $("#statusResponse").html('');
                }
            }
        </script>
    </body>
</html>