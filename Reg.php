<!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Авторизация</title>
 </head>
 <body>
    <a href="index.html"> На главную</a> <br /><br />
    <form method="POST" action="reg_login.php">
        <p>Придумайте логин</p>
        <input name="user" /> <br />
        <p>Придумайте пароль</p>
        <input name="pwd1" type="password"> <br />
        <p>повторите ввод пароля</p>
        <input name="pwd2" type="password"> <br />
        <p>Введите свой фактический адрес</p>
        <input name="addr" type="text"> <br />
        <button>Go!</button>
    </form>
 </body>
 </html>