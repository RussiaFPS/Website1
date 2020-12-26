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
<p style="text-font:sans-serif;">Впишите город </p>
</div>
<div style="margin-left:15%;">
<form action="infaObrabotka.php" method="post">
  <textarea name="gorod" id="gorod" cols="30" rows="1"></textarea></p>
  <p id="textBall" style="margin-left:5%;">Выберите критерий</p>
  <select name="cryt" id="cryt">
    <option>Достопримечательности</option>
    <option>Отель</option>
  </select>
  <button class="btn btn-success" type=submit>Отправить</button>
</form>
</div>
</div>
</div>
</body>
</html>
