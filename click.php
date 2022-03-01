<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Щелчки</title>
</head>
<body>
    <a href="index.html"> Главная</a> <br /><br />
    <h1>Считать щелчки</h1>
    <form>
        <button>Нажми меня</button>
    </form>
    <?php
//        if (isset($_SESSION["cliks"]))
//            $i = $_SESSION["cliks"];
//        else
//            $i = 0;

        if(isset($_COOKIE["cliks"]))
            $i = $_COOKIE["cliks"];
        else
            $i = 0;
            
        $i += 1;
        echo "число щелчков: $i";
        setcookie("cliks", $i, time() + 20);
//        $_SESSION["cliks"] = $i;
    ?>
</body>
</html>