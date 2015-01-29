<?php
    require_once 'settings/db_connect.php' ;
    include 'functions/set.php';
    include 'functions/categorie.php';
    include 'functions/set_mat_common.php';

    $dispo_array = getDispo();
    $cat_array = getCategorie();
?>


<html>
    <head>
        <title>Page de test Ajout Set</title>
        <meta charset="utf-8">
    </head>
    <body>
        <h1>Ajouter un set</h1>
        
        <a href="inventaire.php">Retourner à l'inventaire</a>
        
        <form action="set_ajout.php" method="post">            
            <label>Nom du set <span class="mandatory">*</span></label>
            <input type="text" name="nom">

            <br>
            <label>Disponibilité</label>
            <select name="dispo">
                <?php
                    while($row_dispo = mysqli_fetch_assoc($dispo_array)) {
                        $id_dispo = $row_dispo['id'];
                        $nom_dispo = $row_dispo['nom'];
                    ?>
                            <option value="<?php echo $id_dispo; ?>"> <?php echo $nom_dispo; ?></option>
                    <?php
                    }
                ?>

            </select>
            
            <br>
            <label>Fiche Technique</label>
            <input type="text" name="fiche">
            
            <br>
            <label>Catégorie</label>
            <select name="categorie">
               <option value="0">Aucune catégorie</option>
                <?php
                    while($row_cat = mysqli_fetch_assoc($cat_array)) {
                        $id_cat = $row_cat['id'];
                        $nom_cat = $row_cat['nom'];
                    ?>
                            <option value="<?php echo $id_cat; ?>"> <?php echo $nom_cat; ?></option>
                    <?php
                    }
                ?>
            </select>
            
            <br>
            <label>Description <span class="mandatory">*</span></label>
            <textarea name="description"></textarea>
            
            
            <br>
            <input type="submit" name="addSet" value="Valider"> <input type="reset" value="Annuler">

        </form>
    </body>
</html>