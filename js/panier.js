function afficherPanier() {
    $.getJSON('functions/panier/afficher_panier.php', function(data) {
        var panier = '';
        if(data['nbItem'] == 0) {
            panier += "<li style='margin-left:5px;'>Le panier est vide.</li>";
        } else {
            panier += '<li>Du <input type="text" value="02/02/2015" style="width:80%;"></input></li>';
            panier += '<li>Au <input type="text" value="04/02/2015" style="width:80%;"></li>';
            panier += '<li class="divider"></li>';
            for (var id in data['set']) {
                panier += "<div class='panier_content'>";
                panier += data['set'][id]['nom'];
                panier += "<button value='" + data['set'][id]['id']+ "' onclick='supprimerSet(this)'>X</button>"
                panier += "</div>";
            }
            for (var id in data['materiel']) {
                panier += '<li>' + data['materiel'][id]['nom'] + '<button class="btn btn-default" style="margin-left:5px;" value="' + data['materiel'][id]['id']+ '" onclick="supprimerMateriel(this)">Retirer</button></li>';
            }
            panier += '<a href="recapitulatif_etudiant.php" data-title="Valider la réservation" data-toggle="lightbox" data-gallery="remoteload" role="button" class="btn btn-success">Valider la réservation ></a>';
        }
        $("#panier").html(panier);

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