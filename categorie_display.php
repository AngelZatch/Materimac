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