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
            <li><a href="dashboard.php">Tableau de bord</a></li>
            <li><a href="#">MES NOTIFICATIONS</a></li>
            <li><a href="#">Mon panier</a></li>
            <li><a href="#">Déconnexion</a></li>
          </ul>
          <form class="navbar-form navbar-right" action="recherche_display.php" method="get">
            <input type="text" class="form-control" placeholder="Rechercher..." name="recherche">
            <input type="submit" name="searchBar" class="btn btn-default" value="Ok">
          </form>
        </div>
      </div>
    </nav>