<?php
    session_start();
    if (!isset($_SESSION["user"])){
        echo '<meta http-equiv="refresh" content="4; URL=login.php">';
        die("история операций доступна только авторизованным пользователям. Вы будете перенаправлены на страницу авторизации");
    }
    $user = $_SESSION["user"];    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <style>
        table {
            width: 25%;
        }
        tr:nth-child(even){
            background-color: lightgray;
        }
        tr{
            text-align: right;
        }
        td:nth-child(2){
            text-align: center;
        }
        a {
            color: blue;
            text-decoration: underline;
            cursor: pointer;
        }
    </style>
    <script>
        function HiddenTable(){
            if(document.getElementById("link").innerText != "Показать детализацию"){
                document.getElementById("TblCalcs").style.display = "none";
                document.getElementById("link").innerText = "Показать детализацию"
            }
            else{
                document.getElementById("TblCalcs").style.display = "";
                document.getElementById("link").innerText = "Спрятать детализацию"
            }
        }

    </script>
</head>
<body>
    <a href="index.html"> На главную</a> <br />
    <?php
        echo ("<h1>Твой счет ".$user."</h1>");
    ?>

    <a onclick="HiddenTable();" id="link">Спрятать детализацию</a>

    <table border="1" id="TblCalcs">
        <tr>
            <th>Первое число</th>
            <th>Операция</th>
            <th>Второе число</th>
        </tr>
        <?php

            include("../../params/billing.php");
            $connection = mysqli_connect($db_server,$db_user,$db_pwd,"billing","3306");

            $sql = "SELECT * FROM calcs WHERE User=?"; 
            $statement = mysqli_prepare($connection,$sql);
            mysqli_stmt_bind_param($statement,"s",$user);
            mysqli_stmt_execute($statement);
            $cursor = mysqli_stmt_get_result($statement);
            $result = mysqli_fetch_all($cursor);
            mysqli_close($connection);

            for($i = 0; $i<count($result); $i++){
                echo("<tr>");
                echo("<td>".$result[$i][1]."</td><td>".$result[$i][3]."</td><td>".$result[$i][2]."</td>");
                echo("</tr>");
            }
        ?> 
    <table>

    <?php 
        echo ("<h2>Сумма к оплате: ".count($result)."$</h2>"); 
    ?>
</body>
</html>