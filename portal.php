<?php
include 'login.php';
?>

<html>
<head>
    <meta charset="UTF-8">
    <title>Matérimac - Connexion</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/fonts.css">
</head>
<body>
 <div class="container-fluid">
 <div class="row">
     <div class="col-sm-8 col-sm-offset-2 main">
     <h1 class="page-header">Oplon - Connectez-vous / Consultez un emprunt</h1>
     <div class="col-sm-6">
     <h2 class="log-option">Connexion au compte</h2>
      <div class="form-group">
       <form action method="post">
          <label for="id" class="control-label">Identifiant</label>
          <input type="text" name="id" class="form-control" placeholder="identifiant">
           <br>
          <label for="pwd" class="control-label">Mot de passe</label>
          <input type="password" name="pwd" class="form-control" placeholder="mot de passe">
          <br>
          <button type="submit" name="submit" class="btn btn-default btn-full"><span class="glyphicon glyphicon-log-in"></span> Accéder</button>
           <p><?php echo $error;?></p>
       </form>
    </div>
    </div>
        <div class="col-sm-6">
           <h2 class="log-option">Consultation d'un emprunt</h2>
           <div class="form-group">
               <form action method="post">
                   <label for="reservation-number" class="control-labels">Numéro de réservation</label>
                   <input type="text" name="reservation-number" class="form-control" placeholder="Numéro de réservation">
                   <br>
                   <button type="submit" name="rechercher" class="btn btn-default btn-full"><span class="glyphicon glyphicon-search"></span> Rechercher</button>
               </form>
           </div>
        </div>
    </div>
   </div>
   </div>
</body>
</html>