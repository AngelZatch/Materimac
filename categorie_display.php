<?php
    session_start();
    require_once 'settings/db_connect.php' ;
    include 'functions/categorie.php';
    
    $cat_array = getCategorie(); 
?>


<html>
<head>
    <meta charset="UTF-8">
    <title>Gestion des catégories</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="apple-touch-icon" sizes="57x57" href="icons/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="icons/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="icons/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="icons/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="icons/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="icons/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="icons/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="icons/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="icons/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="icons/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="icons/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="icons/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="icons/favicon-16x16.png">
	<link rel="manifest" href="icons/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="icons/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">
</head>
<body>
    <?php include 'nav.php'; ?>
   <div class="container-fluid">
      <div class="row">
          <?php include 'side-menu.php'; ?>
           <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
               <h1 class="page-header">Gestion des catégories</h1>
        
                <form action="categorie_display.php" method="post">
                   <div class="form-group">
                       <label class="control-label">Nom de la catégorie</label>
                       <input class="form-control" type="text" name="nom">
                   </div>       
                   <br>
                    <input class="btn btn-primary" type="submit" name="addCategorie" value="Ajouter">
                    <input class="btn btn-danger" type="reset" value="Annuler">
                </form>

                <table style="margin-top:50px;">
                    <tr>
                        <th>Nom de la catégorie</th>
                        <th></th>
                    </tr>
                        <?php
                            while($categorie = mysqli_fetch_assoc($cat_array)) {
                                $id = $categorie['id'];
                                $nom = $categorie['nom'];
                        ?>
                            <tr>
                                <td><?php echo $nom; ?></td>
                                <td>
                                    <form method="post" action="categorie_display.php">
                                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                                        <input class="btn btn-primary" type="submit" value="Supprimer" name="deleteCategorie">
                                    </form>
                                </td>
                            </tr>
                        <?php
                            }
                        ?>
                </table>
            </div>
        </div>
    </div>
    
    <script src="js/jquery-1.11.2.min.js"></script>
    <script src="js/jquery-ui-1.11.2/jquery-ui.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>