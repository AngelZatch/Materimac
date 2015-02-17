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
            <li><a href="meetings.php">Tableau de bord gestionnaire</a></li>
            <li><a href="dashboard-etudiants.php">Tableau de bord étudiant</a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Mon panier</a>
                <ul class="dropdown-menu" role="menu">
                    Ma réservation
                    <li>Du <input type="text" value="02/02/2015" style="width:80%;"></input></li>
                    <li>Au <input type="text" value="04/02/2015" style="width:80%;"></li>
                    <li class="divider"></li>
                    <li>Matériel 1 <button class="btn btn-default">Retirer</button></li>
                    <li>Matériel 2 <button class="btn btn-default">Retirer</button></li>
                    <li>Matériel 3 <button class="btn btn-default">Retirer</button></li>
                    <a href="recapitulatif-etudiants.php" class="btn btn-success">Valider la réservation ></a>
                </ul>
            </li>
            <li><a href="#">Déconnexion</a></li>
          </ul>
          <form class="navbar-form navbar-right" action="recherche_display.php" method="get">
            <input type="text" class="form-control" placeholder="Rechercher..." name="recherche">
            <input type="submit" name="searchBar" class="btn btn-default" value="Ok">
          </form>
        </div>
      </div>
    </nav>