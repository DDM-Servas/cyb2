<?php

    $user = $_REQUEST["user"];
    $pwd1 = $_REQUEST["pwd1"];
    $pwd2 = $_REQUEST["pwd2"];
    $addr = $_REQUEST["addr"];

    //trim для удаления пробелов из начала и конца строки.
    //stripslashes для удаления экранированных символов 
    //strip_tags для удаления HTML и PHP тегов. 
    //htmlspecialchars преобразует специальные символы в HTML-сущности 
    function clean($value = "") {
        $value = trim($value);
        $value = stripslashes($value);
        $value = strip_tags($value);
        $value = htmlspecialchars($value);
    
        return $value;
    }

    // проверка на пустые строки
    function check_length($value = "") {
        $result = (mb_strlen($value) < 6);
        return $result;
    }

    $user = clean($user);
    $pwd1 = clean($pwd1);
    $pwd2 = clean($pwd2);
    $addr = clean($addr);
    $pwdhash = hash("sha256",$pwd1);

    include("../../params/billing.php");

    if( empty($user)){
        echo ("Поле Имя пользователя не заполнено");
    }
    elseif( empty($pwd1)){
        echo ("Поле пароль не запонено");
    }
    elseif( empty($pwd2)){
        echo ("Поле подтверждение пароля не заполнено");
    }
    elseif( empty($addr)){
        echo ("Поле адрес не запонено");
    }
    elseif( $pwd1 != $pwd2){
        echo ("Введенные пароли не совпадают");
    } 
    elseif( check_length($pwd2)){
        echo ("Придумайте более сложный пароль");
    } 
    else{
        $connection = mysqli_connect($db_server,$db_user,$db_pwd,"billing");
    
        $sql = "INSERT INTO users(Login,PwdHash,Adress) VALUES('$user','$pwdhash','$addr')";
        
        mysqli_query($connection, $sql);        
        mysqli_close($connection);

        echo ("Регистрация прошла успешно <br />");

        session_start();
        $_SESSION["user"] = $user;
        echo '<meta http-equiv="refresh" content="5; URL=index.html">';
        die("Добро пожаловать, $user. Вы будете перенаправлены на Главную страницу");
    }