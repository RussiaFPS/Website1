<!DOCTYPE html>
<html lang ="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Личный кабинет</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="/css/style1.css">
  <link rel="stylesheet" href="/css/menuStyle1.css">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <meta name=viewport content="width=1000">
  </head>
<body>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <div class="container mt-4">
    <div class="page">
  <nav class="page__menu page__custom-settings menu">
    <ul class="menu__list r-list">
      <li class="menu__group"><a href="index.php" class="menu__link r-link text-underlined">Стартовая страница</a></li>
      <li class="menu__group"><a href="information.php" class="menu__link r-link text-underlined">Информация</a></li>
      <li class="menu__group"><a href="about.php" class="menu__link r-link text-underlined">О нас</a></li>
      <li class="menu__group"><a href="account.php" class="menu__link r-link text-underlined">Личный кабинет</a></li>
    </ul>
  </nav>
</div>
<div align="center" >
<input type="image" id="Avatar" src="Assets/Avatar1.png">
</div>
    <div align="center" >
  <?php
  if($_COOKIE['user']==''):?>
<p id="AccountHello">Гость</p>
<p id="AccountHello2">Хотите <a href ="/registration.php">зарегистрироваться</a> или <a href ="/login.php">авторизоваться</a>?</p>
<?php else:?>
    <p id="AccountHello"><?=$_COOKIE['user']?></p>
        </div>
    <form action="exit.php">
    <button id="ButtonExit" class="btn btn-success">Выйти</button>
    </form>
  <?php endif;?>


  <?php
  $UserRole=$_COOKIE['user'];
  $mysql = new mysqli('localhost', 'root', 'root', 'register-bd');
  if ($mysql->connect_error) {
      die("<script>swal(\"Ошибка!\", \"Не удается установить соединение с базой данных\", \"error\");</script>");
  }
  $result = $mysql->query("SELECT * FROM `users` WHERE `login`='$UserRole' AND `role`='admin'");
  $user = $result->fetch_assoc();
  if(count($user)!=0){
    ?>
    <form action="adminPanel.php">
    <button id="ButtonExit" class="btn btn-success">Админ панель</button>
    </form>
    <?php
  }
  $mysql->close();
    ?>
  </div>
</body>
</html>
