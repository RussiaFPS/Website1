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
<div align="center">
<p id="VivodAdminsInfa">Добавление пользователя</p>
</div>
<div style="margin-right:-20%;">
<form action="addUsers.php" method="post">
  <input id="AddLogin" type="text" name="AddLogin" class="form-control" placeholder="Введите логин"><br>
  <input id="AddPass" type="password" name="AddPass" class="form-control" placeholder="Введите пароль"><br>
    <input id="AddName" type="text" name="AddName" class="form-control" placeholder="Введите имя"><br>
  <select name="AddRole" id="AddRole">
    <option>user</option>
    <option>admin</option>
  </select>
<button id="buttonAddUsers" class="btn btn-success" type=submit style="margin-left:7%;margin-top:2%;">Добавить пользователя</button>
</form>
</div>
<div align="center">
<p id="VivodAdminsInfa">Удаление пользователя</p>
</div>
<div style="margin-right:-20%;">
<form action="delUsers.php" method="post">
  <input id="DelLogin" type="text" name="DelLogin" class="form-control" placeholder="Введите логин"><br>
  <button id="buttonAddUsers" class="btn btn-success" type=submit style="margin-left:7%;">Удалить пользователя</button>
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
include registration.php;
$login = filter_var(trim($_POST['AddLogin']), FILTER_SANITIZE_STRING);
$name = filter_var(trim($_POST['AddName']), FILTER_SANITIZE_STRING);
$pass = filter_var(trim($_POST['AddPass']), FILTER_SANITIZE_STRING);
$role = filter_var(trim($_POST['AddRole']), FILTER_SANITIZE_STRING);

if (mb_strlen($login) < 3 || mb_strlen($login) > 90) {
  echo"<script>swal(\"Недопустимая длина логина!\", \"Логин содержит от 3 до 90 символов\", \"error\");</script>";
    exit();
} elseif (mb_strlen($name) < 3 || mb_strlen($name) > 50) {
    echo"<script>swal(\"Недопустимая длина имени!\", \"Имя содержит от 3 до 50 символов\", \"error\");</script>";
    exit();
} elseif (mb_strlen($pass) < 10 || mb_strlen($pass) > 30) {
    echo"<script>swal(\"Недопустимая длина пароля!\", \"Пароль содержит от 10 до 30 символов\", \"error\");</script>";
    exit();
}elseif (mb_strlen($role) < 3 || mb_strlen($pass) > 15) {
    echo"<script>swal(\"Недопустимая длина роли!\", \"Роль содержит от 3 до 15 символов\", \"error\");</script>";
    exit();
}


$pass = md5($pass."QafjhgjgH74");

$mysql = new mysqli('localhost', 'root', 'root', 'register-bd');

if ($mysql->connect_error) {
    die("<script>swal(\"Ошибка!\", \"Не удается установить соединение с базой данных\", \"error\");</script>");
}

$result = $mysql->query("SELECT * FROM `users` WHERE `login`='$login'");
$user = $result->fetch_assoc();
if(count($user)==0){
  $mysql->query("INSERT INTO `users` (`login` , `pass` , `name`,`role`)
  VALUES('$login','$pass','$name','$role')");
  $mysql->close();
  echo"<script>swal(\"Успешно!\", \"Пользователь успешно зарегистрирован\", \"success\");</script>";
}else{
  $mysql->close();
  echo"<script>swal(\"Такой пользователь уже зарегистрирован!\", \"Поменяйте логин\", \"error\");</script>";
  exit();
}
?>
