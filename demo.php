<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <a href="index.html"> На главную</a> <br /><br />
    <h1>Привет от PHP</h1>   
    <?php
        $x = 2;
        $y = 2;
        $z = $x + $y;
        echo "Результат вычисления равен: $z";
        date_default_timezone_set("Europe/Moscow");
        $now = date("H:i:s d:m:Y");
        echo "<h2>Текущее дата и время в Москве : $now </h2>";
        date_default_timezone_set("Asia/Tokyo");
        $now = date("H:i:s d:m:Y");
        echo "<h2>Текущее дата и время в Токио : $now </h2>";
        date_default_timezone_set("UTC");
        $now = date("H:i:s d:m:Y");
        echo "<h2>Текущее дата и время по Гринвичу : $now </h2>";
    ?>
</body>
</html>