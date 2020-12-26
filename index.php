<!DOCTYPE html>
<html lang ="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Приветствие</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="/css/Mainstyle1.css">
  <meta name=viewport content="width=1000">
    <meta name=viewport content="width=1000">
  </head>
<body>
  <div class="container mt-4">
    <IMG class="displayed" src="Assets/MainLogo1.png">
  <h1 style="text-align:center;">Информационно-справочная система Турист в России</h1>
        <div align="center">
        <form action="registration.php">
        <button id="MainButton" class="btn btn-success">Зарегистрироваться</button>
        </form>
      </div>
        <div align="center">
         <form action="login.php">
           <button id="MainButton1" class="btn btn-success">Авторизоваться</button>
         </form>
       </div>
       <?php
   if($_COOKIE['user']==''):
   ?>
       <div align="center">
         <form action="main.php">
           <button id="MainButton1" class="btn btn-success">Войти как гость</button>
         </form>
       </div>
       <?php endif;?>
   </div>
  </body>
</html>
