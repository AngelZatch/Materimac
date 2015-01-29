<?php
    require_once 'settings/db_connect.php' ;
    include 'functions/set.php';
    include 'functions/categorie.php';
    include 'functions/set_mat_common.php';

    $data = $_GET['id'];
    $set = mysqli_fetch_assoc(fetchSet($data));
    $dispo_set = mysqli_fetch_assoc(fetchDispo($set['disponibilite_id']));
    $cat_set = mysqli_fetch_assoc(fetchCategorie($set['categorie_id']));

    $dispo_array = getDispo();
    $cat_array = getCategorie();
?>


<html>
    <head>
        <title>Modifier Set</title>
        <meta charset="utf-8">
    </head>
    <body>
        <h1>Modifier un set</h1>
        
        <a href="inventaire.php">Retourner à l'inventaire</a>
        
        <form action="set_edit.php?id=<?php echo $set['id']; ?>" method="post">      
           <input type="hidden" name="id" value="<?php echo $set['id'];?>">
                       
            <label>Nom du set <span class="mandatory">*</span></label>
            <input type="text" name="nom" value="<?php echo $set['nom']; ?>">

            <br>
            <label>Disponibilité</label>
            <select name="dispo">
                <?php
                    while($row_dispo = mysqli_fetch_assoc($dispo_array)) {
                        $id_dispo = $row_dispo['id'];
                        $nom_dispo = $row_dispo['nom'];
                        if($id_dispo == $dispo_set['id']) {
                    ?>
                            <option selected="selected" value="<?php echo $id_dispo; ?>"> <?php echo $nom_dispo; ?></option>
                    <?php
                        } else {
                    ?>
                            <option value="<?php echo $id_dispo; ?>"> <?php echo $nom_dispo; ?></option>
                    <?php
                        }
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
                    if($id_cat == $cat_set['id']) {
                    ?>
                            <option selected="selected" value="<?php echo $id_cat; ?>"> <?php echo $nom_cat; ?></option>
                    <?php
                        } else {
                    ?>
                            <option value="<?php echo $id_cat; ?>"> <?php echo $nom_cat; ?></option>
                    <?php
                        }
                    }
                ?>
            </select>
            
            <br>
            <label>Description <span class="mandatory">*</span></label>
            <textarea name="description"><?php echo $set['description']; ?></textarea>
            
            
            <br>
            <input type="submit" name="updateSet" value="Valider"> <input type="reset" value="Annuler">

        </form>
    </body>
</html>