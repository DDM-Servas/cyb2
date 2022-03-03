<?php
    session_start();
    if (!isset($_SESSION["user"])){
        echo '<meta http-equiv="refresh" content="4; URL=login.php">';
        die("история операций доступна только авторизованным пользователям. Вы будете перенаправлены на страницу авторизации");
    }
    $user = $_SESSION["user"];    

    include("../../../params/billing.php");
    $connection = mysqli_connect($db_server,$db_user,$db_pwd,"billing","3306");

    $sql = "SELECT * FROM calcs WHERE User=?"; 
    $statement = mysqli_prepare($connection,$sql);
    mysqli_stmt_bind_param($statement,"s",$user);
    mysqli_stmt_execute($statement);
    $cursor = mysqli_stmt_get_result($statement);
    $result = mysqli_fetch_all($cursor);
    mysqli_close($connection);

    // генерируем JSON из данных биллинга (переменная $result)
    echo(json_encode($result));