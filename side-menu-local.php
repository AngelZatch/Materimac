<?php
require_once 'settings/connection.php';
?>


<div class="col-sm-2 col-md-2 sidebar">
    <ul class="nav nav-sidebar">
        <li><a class="main-option" href="etudiant_dashboard.php"><span class="glyphicon glyphicon-dashboard"></span> Panneau principal</a>
        </li>
        <li><a class="main-option" href=""><span class="glyphicon glyphicon-time"></span> Mes réservations</a>
            <ul class="nav-list">
                <li>En attente</li>
                <li>Validées <span class="badge">1</span></li>
                <li>En cours <span class="badge">1</span></li>
                <li>En retard</li>
                <li>Passées</li>
                <li>Annulées</li>
            </ul>
        </li>
        <li>
            <a class="main-option" href=""><span class="glyphicon glyphicon-user"></span> Mon compte</a>
        </li>
        <li><a href="logout.php" class="main-option"><span class="glyphicon glyphicon-off"></span> Déconnexion</a></li>
    </ul>
</div>