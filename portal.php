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
 <div class="container-fluid">
 <div class="row">
     <div class="col-sm-6 col-sm-offset-3 main">
     <h1 class="page-header">Connectez-vous à Oplon</h1>
 
  <div class="form-group">
       <form action method="post">
          <label for="id" class="control-label">Identifiant</label>
          <input type="text" name="id" class="form-control" placeholder="identifiant">
           <br>
          <label for="pwd" class="control-label">Mot de passe</label>
          <input type="password" name="pwd" class="form-control" placeholder="mot de passe">
          <br>
          <button type="submit" name="submit" class="btn btn-default btn-full"><span class="glyphicon glyphicon-log-in"></span> Accéder à mon espace</button>
           <p><?php echo $error;?></p>
       </form>
    </div>
    </div>
   </div>
   </div>
</body>
</html>