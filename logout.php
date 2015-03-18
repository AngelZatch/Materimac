<?php
session_start();
if(session_destroy()){
    header("location:portal.php");
}
?>