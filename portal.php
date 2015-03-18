<?php
include 'login.php';
?>

<html>
<head>
    <meta charset="UTF-8">
    <title>Matérimac - Connexion</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/dashboard.css">
</head>
<body>
 <div class="container-fluid">
 <div class="row">
     <div class="col-sm-6 col-sm-offset-3 main">
     <h1 class="page-header">Connectez-vous à Matérimac</h1>
 
  <div class="form-group">
       <form action method="post">
          <label for="id" class="control-label">Identifiant</label>
          <input type="text" name="id" class="form-control" placeholder="identifiant">
           <br>
          <label for="pwd" class="control-label">Mot de passe</label>
          <input type="text" name="pwd" class="form-control" placeholder="mot de passe">
          <br>
          <button type="submit" name="submit" class="btn btn-default"><span class="glyphicon glyphicon-log-in"></span> Accéder à mon espace</button>
           <p><?php echo $error;?></p>
       </form>
    </div>
    </div>
   </div>
   </div>
</body>
</html>