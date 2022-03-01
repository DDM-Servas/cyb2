<?php
    $pwd = "123456";
    $hashpwd = hash("sha256",$pwd);
    echo $hashpwd;
    echo "<br />";
    $pwd2 = "Zz123456";
    $hashpwd2 = hash("sha256",$pwd2);
    echo $hashpwd2;