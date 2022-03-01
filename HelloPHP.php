<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hello</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <a href="index.html"> На главную</a> <br /><br />
    <?php
        date_default_timezone_set("Europe/Moscow");
        $hour = date("H");
        if($hour < 5)
            echo "<h1>Доброй ночи</h1>";
        elseif ($hour < 12)
            echo "<h1>Доброе утро</h1>";
        elseif ($hour < 18)
            echo "<h1>Добрый день</h1>";
        else
            echo "<h1>Добрый вечер</h1>";
    ?>
    <h1>Привет от PHP</h1>   
</body>
</html>