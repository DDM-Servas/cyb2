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
    <script>
        function GetData() {
            var url = "API/billingAPI.php";
            var xhr = new XMLHttpRequest();
            xhr.open("GET",url,false);
            xhr.send();
            var text = xhr.responseText;
            //alert(text);
            console.log(text);
             var stockData = JSON.parse(text);
             console.log(stockData);

            for (let i = 0; i < stockData.length; i++) {
                let div = document.createElement('div');
                div.className = "msg";
                if (stockData[i][3] == "plus"){
                    div.innerHTML = "Операция сложения чисел " + stockData[i][1] + " и " + stockData[i][2] + " от " + stockData[i][5];
                    div.id = "pls";
                }
                else if (stockData[i][3] == "minus"){
                    div.innerHTML = "Нахождение разницы между числами " + stockData[i][1] + " и " + stockData[i][2] + " от " + stockData[i][5];
                    div.id = "min";
                }
                document.body.append(div);                
            }
        }
    </script>
    <style>
        #pls{
            background-color: lightblue;
        }
        #min{
            background-color: lightgrey;
        }
        div.msg{
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <a href="index.html"> На главную</a> <br /><br />

    <h1>Сервис по предоставлению счета</h1>
    Хочешь получить инфу - щелкни кнопку
    <button onclick="GetData();">Детализация счета</button> <br /><br />
</body>
</html>