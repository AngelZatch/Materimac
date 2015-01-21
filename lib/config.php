<?php

$con = mysql_connect('localhost', 'root', '') or die(mysql_error());

if(!$con){
    echo "Impossible de se connecter : " . mysql_error();
    exit;
}

if(!mysql_select_db('Materimac')){
    echo "Base non existante : " . mysql_error();
    exit;
}

?>