<?php
    require_once 'lib/config.php';
    session_start();
?>


<html>
<head>
    <meta charset="UTF-8">
    <title>Tests BDD</title>
</head>
<body>
   <?php
    $res1 = mysql_query("SELECT * FROM formation");
    $fetch1 = mysql_fetch_assoc($res1);

    echo "<p> Test Formations : " . $fetch1['acronyme'] . "</p>";
?>
    
</body>
</html>