<?php
    /********* AFFICHAGE DE L'INVENTAIRE **********/
    require_once 'settings/db_connect.php' ;
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
                                <input type="submit" value="Ajouter au panier" name="addPanierMateriel">
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
                                <input type="submit" value="Ajouter au panier" name="">
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
                                <input type="submit" value="Supprimer du panier" class="deletePanierMateriel" name="deletePanierMateriel">
                            </form>
                        </li>
                    </ul>
                    <?php
                }
            ?>
        </div>
        
        <script>
           $(document).ready(function() {
                // Ajouter un materiel au panier
                $(".deletePanierMateriel").click(function(e) {
                    e.preventDefault();
                    var postData = 'id=' + $(".item_id").val() + '&deletePanierMateriel=' + $(".deletePanierMateriel").val();
                    jQuery.ajax({
                        type: "POST",
                        url: "functions/panier.php",
                        dataType: "text",
                        data: postData,
                    });
                });
            });
            /*$(document).ready(function() {
                //##### send add record Ajax request to response.php #########
                $("#FormSubmit").click(function (e) {
                        e.preventDefault();
                        if($("#contentText").val()==='')
                        {
                            alert("Please enter some text!");
                            return false;
                        }

                        $("#FormSubmit").hide(); //hide submit button
                        $("#LoadingImage").show(); //show loading image

                        var myData = 'content_txt='+ $("#contentText").val(); //build a post data structure
                        jQuery.ajax({
                        type: "POST", // HTTP method POST or GET
                        url: "response.php", //Where to make Ajax calls
                        dataType:"text", // Data type, HTML, json etc.
                        data:myData, //Form variables
                        success:function(response){
                            $("#responds").append(response);
                            $("#contentText").val(''); //empty text field on successful
                            $("#FormSubmit").show(); //show submit button
                            $("#LoadingImage").hide(); //hide loading image

                        },
                        error:function (xhr, ajaxOptions, thrownError){
                            $("#FormSubmit").show(); //show submit button
                            $("#LoadingImage").hide(); //hide loading image
                            alert(thrownError);
                        }
                        });
                });

                //##### Send delete Ajax request to response.php #########
                $("body").on("click", "#responds .del_button", function(e) {
                     e.preventDefault();
                     var clickedID = this.id.split('-'); //Split ID string (Split works as PHP explode)
                     var DbNumberID = clickedID[1]; //and get number from array
                     var myData = 'recordToDelete='+ DbNumberID; //build a post data structure

                    $('#item_'+DbNumberID).addClass( "sel" ); //change background of this element by adding class
                    $(this).hide(); //hide currently clicked delete button

                        jQuery.ajax({
                        type: "POST", // HTTP method POST or GET
                        url: "response.php", //Where to make Ajax calls
                        dataType:"text", // Data type, HTML, json etc.
                        data:myData, //Form variables
                        success:function(response){
                            //on success, hide  element user wants to delete.
                            $('#item_'+DbNumberID).fadeOut();
                        },
                        error:function (xhr, ajaxOptions, thrownError){
                            //On error, we alert user
                            alert(thrownError);
                        }
                        });
                });

            });*/
        </script>
    </body>
</html>