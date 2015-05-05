   <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
        
          <a class="navbar-brand"
          <?php if($_SESSION['power'] == "1") echo 'href="dashboard.php">Matérimac - Gestionnaire</a>';
                if($_SESSION['power'] == "2") echo 'href="etudiant_dashboard.php">Matérimac - Etudiant</a>';
			 	if($_SESSION['power'] == "3") echo 'href="local_dashboard.php">Matérimac - Local</a>'
			 ?>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-shopping-cart"></span> Mon panier</a>
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
            <li><a href="#"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['prenom'];?></a></li>
            <li><a href="logout.php"><span class="glyphicon glyphicon-off"></span> Déconnexion</a></li>
          </ul>
          <form class="navbar-form navbar-right" action="recherche_display.php" method="get">
            <input type="text" class="form-control" placeholder="Rechercher..." name="recherche">
            <input type="submit" name="searchBar" class="btn btn-default" value="Ok">
          </form>
        </div>
    </div>
</nav>