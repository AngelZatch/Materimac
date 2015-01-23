<html>
<head>
    <meta charset="UTF-8">
    <title>Gestion de matériel IMAC</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/dashboard.css">
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Matérimac</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Tableau de bord</a></li>
            <li><a href="#">MES NOTIFICATIONS</a></li>
            <li><a href="#">Mon panier</a></li>
            <li><a href="#">Déconnexion</a></li>
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Rechercher...">
          </form>
        </div>
      </div>
    </nav>
   <div id="page">
       <div class="col-sm-3 col-md-2 sidebar">
         <ul class="nav nav-sidebar">
             <li>
                 <a href>
                     Rendez-vous du jour
                     <span class="badge">3</span>
                 </a>
             </li>
             <li>
                 <a href>Planning</a>
             </li>
         </ul>  
         <ul class="nav nav-sidebar">
             <li>
                 <a href>
                     Réservations
                     <span class="badge">4</span>
                 </a>
             </li>
         </ul>  
         <ul class="nav nav-sidebar">
             <li><a href>Inventaire</a></li>
         </ul>
         <ul class="nav nav-sidebar">
             <li><a href>Gestion des étudiants <span class="badge">2</span></a></li>
         </ul>
         <ul class="nav nav-sidebar">
             <li><a href>Gestion des projets</a></li>
         </ul>
         <ul class="nav nav-sidebar">
             <li><a href>Administration Générale</a></li>
         </ul>  
       </div>
   </div>
    
    <script src="js/jquery-1.11.2.min.js"></script>
    <script src="js/jquery-ui-1.11.2/jquery-ui.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>