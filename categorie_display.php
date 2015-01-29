<?php
    require_once 'settings/db_connect.php' ;
    include 'functions/categorie.php';
    
    $cat_array = getCategorie(); 
?>


<html>
    <head>
        <title>Gestion des catégories</title>
        <meta charset="utf-8">
    </head>
    <body>
        <h1>Gérer les catégories</h1>
        
        <a href="inventaire.php">Retourner à l'inventaire</a>
        
        <form action="categorie_display.php" method="post">            
            <label>Nom de la catégorie <span class="mandatory">*</span></label>
            <input type="text" name="nom">
            <br>
            <input type="submit" name="addCategorie" value="Valider"> <input type="reset" value="Annuler">
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
                                <input type="submit" value="Supprimer" name="deleteCategorie">
                            </form>
                        </td>
                    </tr>
                <?php
                    }
                ?>
        </table>
    </body>
</html>