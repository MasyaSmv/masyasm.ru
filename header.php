<?php
session_start();
?>

<!DOCTYPE html>
<html lang="ru">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Просто стили -->
    <link rel="stylesheet" type="text/css" href="css/style.css?v=1.0.1.8">
    <link rel="stylesheet" type="text/css" href="css/modal_window.css?v=1.0.0.1">

    <!-- Иконка вкладки -->
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">

    <!-- Шрифт для имени -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=RocknRoll+One&display=swap" rel="stylesheet">

    <!-- Подключение Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <!-- Подключение MBD -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
    <link rel="stylesheet" href="css/mdb.min.css" />

    <!-- скрипты MBD -->
    <script type="text/javascript"></script>
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <script>
      const searchButton = document.getElementById('search-button');
      const searchInput = document.getElementById('search-input');
        searchButton.addEventListener('click', () => {
          const inputValue = searchInput.value;
          alert(inputValue);
        });
    </script>

    <!-- Имя вкладки -->
    <title>MasyaTest</title>
</head>

<body>
  <!-- Логотип -->
  <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
    <nav class="navbar navbar navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" style="padding-left: 20px;" href="#">
          <img src="cat.png" alt="" width="50">
        </a>
      </div>
    </nav>

    <!-- Имя логотипа -->
    <div class="container-fluid">
      <a class="navbar-brand" href="#" style="font-family: 'RocknRoll One', sans-serif;">MasyaSmerd</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
    </div>

    <!-- Поиск -->
    <div class="d7">
      <form class="form-search">
        <input class="input-search" type="text" placeholder="Введите запрос">
        <button class="button-search" type="submit"></button>
      </form>
    </div>

    <!-- Кнопка входа -->
    <div class="btn-group dropstart" style="margin-right:2em">
      <button onclick="document.getElementById('id01').style.display='block'" type="button" class="btn btn-outline-primary  id="dropdownMenuButton" style="color:white; background:#0d6efd"data-bs-toggle="dropdown" aria-expanded="false">Войти</button>
    </div>

    <!-- Модальное окно входа -->
    <div id="id01" class="modal">

      <!-- Аватарка -->
      <form class="modal-content-animate" style="background:#171717" action="/action_page.php" >
        <div class="imgcontainer">
          <span onclick="document.getElementById('id01').style.display='none'" class="closer" title="Close Modal">×</span>
          <img src="favicon.ico" alt="Avatar" class="avatar">
        </div>

        <!-- Логин -->
        <div class="container">
          <div class="modal-container">
            <label  for="uname"><b>Логин</b></label>
            <input class="modal-input" type="text" placeholder="Введите логин" name="uname" required>

            <!-- Пароль -->
              <label for="psw"><b>Пароль</b></label>
              <input class="modal-input" type="password" required placeholder="Введите пароль" name="psw" >

            <!-- Кнопки входов -->
              <button class="modal-button-login" type="submit">Войти</button>
              <button class="modal-button-registration" type="button"><a href="#" style="color: #ffffff">Регистарция</a></button>

            <!-- Кнопки запоминания с броса паролей -->
              <label class="checkbox">
              <input type="checkbox" name="remember" >Запомнить меня
              </label>
              <span class="psw">Забыли <a href="#">пароль?</a></span>
          </div>
        </div>
      </form>
    </div>

<script>
// Окно авторизации
var modal = document.getElementById('id01');

// Скрипт закрытия окна авторизации
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
</div>
</nav>
