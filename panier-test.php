<?php
    /********* AFFICHAGE DE L'INVENTAIRE **********/
    require_once 'settings/db_connect.php';
    include 'functions/materiel.php';
    include 'functions/set.php';
    include 'functions/panier.php';
    include 'functions/set_mat_common.php';
    session_start();

    $materiels = getMateriel();
    $sets = getSet();
    $panier_items = getPanier();
    if(isset($_SESSION['id'])) {echo $_SESSION['id'];} else echo "No session";
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
                          <button value="<?php echo $id; ?>" onclick="ajouterMateriel(this)">Ajouter au panier</button>
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
                          <button value="<?php echo $id; ?>" onclick="ajouterSet(this)">Ajouter au panier</button>
                        </td>
                    </tr>
                <?php
                    }
                ?>
        </table>
        
        <div>
            <h2>Panier</h2>            
            <div id="panier_vide">
                <p style='color:red;'> Pas d'item dans le panier </p></div>
            <div id="panier">pwet
            </div>
        </div>
        
        <script>
            
            function afficherPanier() {
                $.getJSON('functions/panier/afficher_panier.php', function(data) {
                    var panier = '';
                    if(data['nbItem'] == 0) {
                        $('#panier_vide').show();
                        $('#panier').hide();
                    } else {
                        panier += "<ul>";
                        for (var id in data['set']) {
                            panier += "<div class='panier_content'>";
                            panier += data['set'][id]['nom'];
                            panier += "<button value='" + data['set'][id]['id']+ "' onclick='supprimerSet(this)'>X</button>"
                            panier += "</div>";
                        }
                        for (var id in data['materiel']) {
                            panier += "<div class='panier_content'>";
                            panier += data['materiel'][id]['nom'];
                            panier += "<button value='" + data['materiel'][id]['id']+ "' onclick='supprimerMateriel(this)'>X</button>"
                            panier += "</div>";
                        }
                        panier += "</ul>";
                        $('#panier_vide').hide();
                        $('#panier').show();
                        $("#panier").html(panier);
                    }
                    
                });
            }
                    
            // actualisation des membres connectés
            var reloadTime = 1000;
            window.setInterval(afficherPanier, reloadTime);
            
            
            function ajouterMateriel(item) {
                // On lance la requête ajax
                // type: POST > nous envoyons le nouveau statut
                $.ajax({
                    type: "POST",
                    url: "functions/panier/ajouter_panier.php",
                    data: "materiel_id="+item.value,
                    success: function(msg){
                        // On affiche la réponse
                        $("#statusResponse").html('<span style="color:green">Le statut a &eacute;t&eacute; mis &agrave; jour</span>');
                        setTimeout(rmResponse, 3000);
                    },
                    error: function(msg){
                        // On affiche l'erreur dans la zone de réponse
                        $("#statusResponse").html('<span style="color:orange">Erreur</span>');
                        setTimeout(rmResponse, 3000);
                    }
                });
                afficherPanier();
            }
            
            function ajouterSet(item) {
                // On lance la requête ajax
                // type: POST > nous envoyons le nouveau statut
                $.ajax({
                    type: "POST",
                    url: "functions/panier/ajouter_panier.php",
                    data: "set_id="+item.value,
                    success: function(msg){
                        // On affiche la réponse
                        $("#statusResponse").html('<span style="color:green">Le statut a &eacute;t&eacute; mis &agrave; jour</span>');
                        setTimeout(rmResponse, 3000);
                    },
                    error: function(msg){
                        // On affiche l'erreur dans la zone de réponse
                        $("#statusResponse").html('<span style="color:orange">Erreur</span>');
                        setTimeout(rmResponse, 3000);
                    }
                });
                afficherPanier();
            }

            function rmResponse() {
                $("#statusResponse").html('');
            }
            
            function supprimerMateriel(item) {
                // On lance la requête ajax
                // type: POST > nous envoyons le nouveau statut
                $.ajax({
                    type: "POST",
                    url: "functions/panier/supprimer_panier.php",
                    data: "materiel_id="+item.value,
                    success: function(msg){
                        // On affiche la réponse
                        $("#statusResponse").html('<span style="color:green">Le statut a &eacute;t&eacute; mis &agrave; jour</span>');
                        setTimeout(rmResponse, 3000);
                    },
                    error: function(msg){
                        // On affiche l'erreur dans la zone de réponse
                        $("#statusResponse").html('<span style="color:orange">Erreur</span>');
                        setTimeout(rmResponse, 3000);
                    }
                });
                afficherPanier();
            }
            
            function supprimerSet(item) {
                // On lance la requête ajax
                // type: POST > nous envoyons le nouveau statut
                $.ajax({
                    type: "POST",
                    url: "functions/panier/supprimer_panier.php",
                    data: "set_id="+item.value,
                    success: function(msg){
                        // On affiche la réponse
                        $("#statusResponse").html('<span style="color:green">Le statut a &eacute;t&eacute; mis &agrave; jour</span>');
                        setTimeout(rmResponse, 3000);
                    },
                    error: function(msg){
                        // On affiche l'erreur dans la zone de réponse
                        $("#statusResponse").html('<span style="color:orange">Erreur</span>');
                        setTimeout(rmResponse, 3000);
                    }
                });
                afficherPanier();
            }
            
        
        </script>
    </body>
</html>