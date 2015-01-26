<?php
require_once 'settings/connection.php';
include 'functions/etudiants.php';

?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Liste des Etudiants</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/dashboard.css">
</head>
<body>
    <?php include 'nav.php'; ?>
    <div class="container-fluid">
        <div class="row">
            <?php include 'side-menu.php'; ?>
           <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
               <h1 class="page-header">Inventaire de Matériel</h1>
               <div class="row">
                   <div class="col-md-4">
                       <h2>Catégories</h2>
                       <input type="checkbox" name="" id="">Sets Vidéos
                       <br>
                       <input type="checkbox" name="" id="">Prise de Son
                       <br>
                       <input type="checkbox" name="" id="">Traitement de son
                       <br>
                       <input type="checkbox" name="" id="">Vidéoprojecteur
                       <br>
                       <input type="checkbox" name="" id="">Prise de vue
                       <br>
                       <input type="checkbox" name="" id="">Lumière
                       <br>
                       <input type="checkbox" name="" id="">Interactivité
                       <br>
                       <input type="checkbox" name="" id="">Divers
                       <br>
                       <input type="checkbox" name="" id="">Consommables
                       <br>
                       <input type="checkbox" name="" id="">Informatique
                       <br>
                   </div>
                   <div class="col-md-4">
                       <h2>Disponibilité</h2>
                       <input type="checkbox"> <img src="icons/materiel-disponible.png" alt="">Disponible<br>
                       <input type="checkbox"> <img src="icons/materiel-reserve.png" alt=""> Prévu aujourd'hui<br>
                       <input type="checkbox"> <img src="icons/materiel-indisponible.png" alt=""> Indisponible<br>
                       <input type="checkbox"> <img src="icons/materiel-gele.png" alt=""> Gelé<br>
                   </div>
                   <div class="col-md-4">
                       <h2>Etat du matériel</h2>
                       <input type="checkbox" name="" id="">Neuf
                       <br>
                       <input type="checkbox" name="" id="">Très bon état
                       <br>
                       <input type="checkbox" name="" id="">Bon état
                       <br>
                       <input type="checkbox" name="" id="">OK
                       <br>
                       <input type="checkbox" name="" id="">Mauvais état
                       <br>
                       <input type="checkbox" name="" id="">Cassé
                       <br>
                   </div>
               </div>
               <div class="table-responsive">
                  <h3>Interactivité</h3>
                   <table class="table table-striped">
                       <thead>
                           <tr>
                               <th>Nom Produit</th>
                               <th>Référence</th>
                               <th>n°CN</th>
                               <th>Etat</th>
                               <th>Disponibilité</th>
                               <th>Notes</th>
                               <th>Actions</th>
                           </tr>
                       </thead>
                       <tr>
                           <td>Leap Motion</td>
                           <td>Leap Motion</td>
                           <td></td>
                           <td>Cassé</td>
                           <td><img src="icons/materiel-gele.png" alt=""></td>
                           <td>Problème d'alimentation</td>
                           <td>Modifier</td>
                       </tr>
                       <tr>
                           <td>Kinect XBOX 360</td>
                           <td>Microsoft</td>
                           <td>CN-1528</td>
                           <td>Très bon état</td>
                           <td><img src="icons/materiel-disponible.png" alt="Disponible"></td>
                           <td>Manque cache</td>
                           <td>Modifier</td>
                       </tr>
                       <tr>
                           <td>Oculus Rift</td>
                           <td>Oculus</td>
                           <td>CN-2863</td>
                           <td>Très bon état</td>
                           <td><img src="icons/materiel-disponible.png" alt="Disponible"></td>
                           <td>ESIEE</td>
                           <td>Modifier</>
                       </tr>
                   </table>
                   <h3>Sets Vidéo</h3>
                   <table class="table table-striped">
                       <tr>
                           <td>Set Vidéo 1</td>
                           <td></td>
                           <td></td>
                           <td></td>
                           <td><img src="icons/materiel-disponible.png" alt="Disponible"></td>
                           <td></td>
                           <td></td>
                       </tr>
                       <tr>
                           <td>Sacoche</td>
                           <td>Case Logic DCB 307</td>
                           <td>CN-1790</td>
                           <td>Bon état</td>
                           <td></td>
                           <td></td>
                           <td>Modifier</td>
                       </tr>
                       <tr>
                           <td>Boîtier photo</td>
                           <td>7D Canon</td>
                           <td>CN-1761</td>
                           <td>Très bon état</td>
                           <td></td>
                           <td>Pas de cadre viewfinder</td>
                           <td>Modifier</td>
                       </tr>
                       <tr>
                           <td>Objectif</td>
                           <td>DC HSM 30mm 1:1:4 Sigma</td>
                           <td>CN-1763</td>
                           <td>Très bon état</td>
                           <td></td>
                           <td></td>
                           <td>Modifier</td>
                       </tr>
                       <tr>
                           <td>Chargeur + cordon alim.</td>
                           <td>Canon</td>
                           <td></td>
                           <td>Très bon état</td>
                           <td></td>
                           <td></td>
                           <td>Modifier</td>
                       </tr>
                       <tr>
                           <td>Batteries x2</td>
                           <td>Canon</td>
                           <td>dont CN-2731</td>
                           <td>Très bon état</td>
                           <td></td>
                           <td></td>
                           <td>Modifier</td>
                       </tr>
                       <tr>
                           <td>Carte mémoire 32GB</td>
                           <td>ScanDisk EX. compact flash 32 GB</td>
                           <td>CN-1700</td>
                           <td>Très bon état</td>
                           <td></td>
                           <td></td>
                           <td>Modifier</td>
                       </tr>
                       <tr>
                           <td>Cordon USB</td>
                           <td></td>
                           <td></td>
                           <td>Bon état</td>
                           <td></td>
                           <td></td>
                           <td>Modifier</td>
                       </tr>
                       <tr>
                           <td>Cordon audio/vidéo</td>
                           <td></td>
                           <td></td>
                           <td>Bon état</td>
                           <td></td>
                           <td></td>
                           <td>Modifier</td>
                       </tr>
                       <tr>
                           <td>Micro</td>
                           <td>Sennheiser MKE 400</td>
                           <td>CN-1773</td>
                           <td>Très bon état</td>
                           <td></td>
                           <td></td>
                           <td>Modifier</td>
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