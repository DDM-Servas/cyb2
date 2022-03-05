<?php
    session_start();
    $user = $_SESSION["user"];

    $x = $_REQUEST["x"];
    $y = $_REQUEST["y"];
    
    include("../../../params/billing.php");

    $connection = mysqli_connect($db_server,$db_user,$db_pwd,"billing","3306");
    
    $nowdate = date("d/m/Y");
    $sql = "INSERT INTO calcs(Number1,Number2,Operation,User,Timestamp) VALUES($x,$y,'plus','$user','$nowdate')";
    
    mysqli_query($connection, $sql);
    
    mysqli_close($connection);
    $z = $x + $y;
    echo $z;
