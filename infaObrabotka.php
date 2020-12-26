<!DOCTYPE html>
<html lang ="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Информация</title>
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
    <p style="text-font:sans-serif;">Результат поиска</p>
    </div>
</div>
</body>
</html>


<?php
$gorod = filter_var(trim($_POST['gorod']), FILTER_SANITIZE_STRING);
$tip=0;
if($_POST['cryt']=="Достопримечательности"){
 $tip=0;
}else if($_POST['cryt']=="Отель"){
  $tip=1;
}


$mysql = new mysqli('localhost', 'root', 'root', 'infa-bd');

if ($mysql->connect_error) {
    die("<script>swal(\"Ошибка!\", \"Не удается установить соединение с базой данных\", \"error\");</script>");
}

$sql = $mysql->query("SELECT * FROM `infa` WHERE `gorod`='$gorod' ");
  if($tip==0){
    ?><div class="head_info" align="center">
      <table>
  <colgroup>
    <col span="1" style="background: #a2f5cd">
    <col span="2" style="background: #dfa2f5">
  </colgroup>
  <tr>
    <th>Город</th>
    <th>Достопримечательность</th>
    <th>Тип достопримечательности</th>
  </tr>
  <?php while ($result = mysqli_fetch_array($sql)) {?>
  <tr>
    <td align="center"><?php echo "{$result['gorod']}";?></td>
    <td align="center"><?php echo "{$result['dos']}";?></td>
    <td align="center"><?php echo "{$result['typeDos']}";?></td>
  </tr>
 <?php
  }
  ?>
</table>
</div>
<?php
}else if($tip==1){
  ?><div class="head_info" align="center">
    <table>
<colgroup>
  <col span="1" style="background: #a2f5cd">
  <col span="2" style="background: #dfa2f5">
</colgroup>
<tr>
  <th>Город</th>
  <th>Отель</th>
  <th>Средняя цена</th>
</tr>
<?php while ($result = mysqli_fetch_array($sql)) {?>
<tr>
  <td align="center"><?php echo "{$result['gorod']}";?></td>
  <td align="center"><?php echo "{$result['hotel']}";?></td>
  <td align="center"><?php echo "{$result['checkHotel']}";?></td>
</tr>
<?php
}
?>
</table>
</div>
<?php
}

$mysql->close();
?>
