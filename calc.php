<?php
    session_start();
    if (!isset($_SESSION["user"])){
        echo '<meta http-equiv="refresh" content="2; URL=login.php">';
        die("Доступ запрещен. Вы будете перенаправлены на страницу авторизации");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Калькулятор</title>
    <style>
        input{
            margin: 5px;
            width: 260px;
            height: 30px;
            text-align: right;
        }
        button{
            width: 127px;
            margin-left: 10px;
            height: 30px;
            margin: 5px;
            background-color: #b4abab;
        }
    </style>
    <script>
        function plus(){
            x = parseInt(document.getElementById("txtx").value);
            y = parseInt(document.getElementById("txty").value);
            //z = x + y;
            url = "API/plus.php?x=" + x + "&y=" + y;
            xhr = new XMLHttpRequest();
            xhr.open("GET",url,false);
            xhr.send();
            z = xhr.responseText;
            document.getElementById("txtz").value = z;
            document.getElementById("pls").style.backgroundColor = '#F00';
            document.getElementById("min").style.backgroundColor = '#b4abab';
        }
        function minus(){
            x = parseInt(document.getElementById("txtx").value);
            y = parseInt(document.getElementById("txty").value);
            //z = x - y;
            url = "API/minus.php?x=" + x + "&y=" + y;
            xhr = new XMLHttpRequest();
            xhr.open("GET",url,false);
            xhr.send();
            z = xhr.responseText;
            document.getElementById("txtz").value = z;
            document.getElementById("pls").style.backgroundColor = '#b4abab';
            document.getElementById("min").style.backgroundColor = '#F00';
        }
    </script>
</head>
<body>
    <a href="index.html"> На главную</a> <br />
    <h1>Калькулятор</h1>
    <input id="txtx"/> <br />
    <input id="txty" /> <br />
    <button id="pls" onclick="plus();">+</button> 
    <button id="min" onclick="minus();">-</button> <br />
    <input id="txtz" /> <br />
</body>
</html>