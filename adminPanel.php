<!DOCTYPE html>
<html lang ="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Админ панель</title>
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
<div id="otzivtext" align="center">
<p>Админ панель</p>
</div>
<div align="center" style="margin-right:37%;">
<form action="ProcessingUsers.php">
<button class="btn btn-success">Работа с аккаунтами пользователей</button>
</form>
<form action="ProcessingInfa.php">
<button class="btn btn-success" style="margin-top:5%;">Работа со справочной информацией</button>
</form>
</div>
</div>
</body>
</html>


<?php
$UserRole=$_COOKIE['user'];
$mysql = new mysqli('localhost', 'root', 'root', 'register-bd');

if ($mysql->connect_error) {
    die("<script>swal(\"Ошибка!\", \"Не удается установить соединение с базой данных\", \"error\");</script>");
}

$result = $mysql->query("SELECT * FROM `users` WHERE `login`='$UserRole' AND `role`='admin'");
$user = $result->fetch_assoc();
if(count($user)==0){
    header('Location:/index.php');
}
$mysql->close();

?>