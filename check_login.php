<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $user = $_REQUEST['user'];
        $pwd = $_REQUEST['pwd'];
        $hashpwd = hash("sha256",$pwd);
 
        include("../../params/billing.php");
        $connection = mysqli_connect($db_server,$db_user,$db_pwd,"billing","3306");

        //$sql = "SELECT * FROM users WHERE Login='$user' AND PwdHash='$hashpwd' "; 
        //$query = mysqli_query($connection, $sql);
        //$result = mysqli_fetch_all($query);

        #параметрический запрос
        $sql = "SELECT * FROM users WHERE Login=? AND PwdHash=? "; 
        $statement = mysqli_prepare($connection,$sql);
        mysqli_stmt_bind_param($statement,"ss",$user,$hashpwd);
        mysqli_stmt_execute($statement);
        $cursor = mysqli_stmt_get_result($statement);
        $result = mysqli_fetch_all($cursor);

        mysqli_close($connection);

        //var_dump($result);
        if (count($result) == 0){
            echo("Неверный логин или пароль");
            echo '<meta http-equiv="refresh" content="4; URL=login.php">';
            die("<br />Будте внимательны при вводе логина и пароля.<br /> Вы будете перенаправлены на страницу авторизации");
        }
        else {
            echo "<h1>С возвращением, $user </h1>";
            $_SESSION["user"] = $user;
            echo '<meta http-equiv="refresh" content="3; URL=calc.php">';
            die("Доступ разрешен. Вы будете перенаправлены на страницу калькулятора");
        }
    ?>    
</body>
</html>
