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
<div id="otzivtext" align="center"   style="margin-top: 7%;">
<p>Админ панель</p>
</div>


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


$mysql = new mysqli('localhost', 'root', 'root', 'infa-bd');

if ($mysql->connect_error) {
    die("<script>swal(\"Ошибка!\", \"Не удается установить соединение с базой данных\", \"error\");</script>");
}

$sql = $mysql->query("SELECT * FROM `infa` WHERE `gorod`!=''");
    ?><div class="head_info" align="center">
      <table>
  <colgroup>
    <col span="1" style="background: #a2f5cd">
    <col span="5" style="background: #dfa2f5">
  </colgroup>
  <tr>
    <th>№ Строки</th>
    <th>Город</th>
    <th>Достопримечательность</th>
    <th>Тип достопримечательности</th>
    <th>Отель</th>
    <th>Средняя цена</th>
  </tr>
  <?php while ($result = mysqli_fetch_array($sql)) {?>
  <tr>
    <td align="center"><?php echo "{$result['id']}";?></td>
    <td align="center"><?php echo "{$result['gorod']}";?></td>
    <td align="center"><?php echo "{$result['dos']}";?></td>
    <td align="center"><?php echo "{$result['typeDos']}";?></td>
    <td align="center"><?php echo "{$result['hotel']}";?></td>
    <td align="center"><?php echo "{$result['checkHotel']}";?></td>
  </tr>
 <?php
  }
  ?>
</table>
</div>
<?php

$mysql->close();
?>

<div align="center">
<p id="VivodAdminsInfa">Удаление информации</p>
</div>
<div style="margin-right:-20%;">
<form action="DelInfa.php" method="post">
  <input id="DelId" type="text" name="DelId" class="form-control" placeholder="Введите № Строки" style="width: 300px;"><br>
  <button id="buttonAddUsers" class="btn btn-success" type=submit style="margin-left:7%;">Удалить информацию</button>
</form>
</div>
<div align="center">
<p id="VivodAdminsInfa">Добавление информации</p>
</div>

<div class="container">
<form action="AddInfa.php" method="post">
  <div class="row">
    <div class="col-sm-4">
      <input type="text" id="AddGorod"name="AddGorod" class="form-control" placeholder="Введите город">
    </div>
    <div class="col-sm-4">
      <input type="text" id="AddDos"name="AddDos" class="form-control" placeholder="Введите достопримечательность">
    </div>
    <div class="col-sm-4">
      <input type="text" id="AddTypeDos"name="AddTypeDos" class="form-control" placeholder="Введите тип достопримечательность">
    </div>
    <div class="col-sm-4">
      <input type="text" id="AddCafe"name="AddCafe" class="form-control" placeholder="Введите название отеля" style="margin-top:3%;">
    </div>
    <div class="col-sm-4">
      <input type="text" id="AddCheckCafe"name="AddCheckCafe" class="form-control" placeholder="Введите среднюю цену" style="margin-top:3%;">
    </div>
  </div>
  <button id="buttonAddUsers" class="btn btn-success" type=submit style="margin-left:20%;">Добавить информацию</button>
</form>
</div>
<div style="margin-top:1%;">
<form action="ProcessingInfa.php">
  <button id="buttonAddUsers" class="btn btn-success" style="margin-left:20%;">Обновить информацию в таблице</button>
</form>
</div>
</div>
</body>
</html>
