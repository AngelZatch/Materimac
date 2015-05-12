<?php
    include 'functions/valider_reservation.php';
?> 

<nav class="navbar navbar-inverse navbar-fixed-top">
   <script src="js/panier.js"></script>
    <div class="container-fluid">
        <div class="navbar-header">

            <a class="navbar-brand"
               <?php if($_SESSION['power'] == "1") echo 'href="dashboard.php">Oplon</a>';
                     if($_SESSION['power'] == "2") echo 'href="home.php">Oplon</a>';
                     if($_SESSION['power'] == "3") echo 'href="local_dashboard.php">Oplon</a>'
               ?>
        </div>
            <div id="navbar" class="navbar-collapse collapse">
                <script src="js/panier.js"></script>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" onclick="afficherPanier()"><span class="glyphicon glyphicon-shopping-cart"></span> Mon panier</a>
                        <ul id="panier" class="dropdown-menu" role="menu"></ul>
                    </li>
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['prenom'];?></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a <?php if($_SESSION['power'] == "1") echo 'href="dashboard.php">';
                                         if($_SESSION['power'] == "2") echo 'href="etudiant_dashboard.php">';
                                         if($_SESSION['power'] == "3") echo 'href="local_dashboard.php">'?>Dashboard</a></li>
                            <li><a href="user_profile.php">Mon compte</a></li>
                        </ul>
                    </li>
                    <li><a href="logout.php"><span class="glyphicon glyphicon-off"></span> Déconnexion</a></li>
                </ul>
                <form class="navbar-form navbar-right" action="recherche_display.php" method="get">
                    <input type="text" class="form-control" placeholder="Rechercher..." name="recherche">
                    <input type="submit" name="searchBar" class="btn btn-default" value="Ok">
                </form>
            </div>
        </div>
        </nav>