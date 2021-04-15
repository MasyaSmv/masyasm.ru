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

    <!-- Иконка вкладки -->
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">

    <!-- Шрифт для имени -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=RocknRoll+One&display=swap" rel="stylesheet">

    <!-- Подключение Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

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

<!-- Поиск -->
        <div class="input-group" style="padding-left: 30em;">
  <div class="form-outline">
    <input id="search-input" type="search" id="form1" class="form-control" style="background: white; width: 30em"/>
    <label class="form-label" for="form1">Search</label>
  </div>
  <button id="search-button" type="button" class="btn btn-primary">
    <i class="fas fa-search"></i>
  </button>
</div>

      <div class="btn-group dropstart">
  <button type="button" class="btn btn-outline-primary id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
    Войти
  </button>
      </div>


          <!-- Выпадающее меню авторизации -->
          <div class="dropdown-menu">
  <form class="px-4 py-3">
    <div class="mb-3">
      <label for="exampleDropdownFormEmail1" class="form-label">Email address</label>
      <input type="email" class="form-control" id="exampleDropdownFormEmail1" placeholder="email@example.com">
    </div>
    <div class="mb-3">
      <label for="exampleDropdownFormPassword1" class="form-label">Password</label>
      <input type="password" class="form-control" id="exampleDropdownFormPassword1" placeholder="Password">
    </div>
    <div class="mb-3">
      <div class="form-check">
        <input type="checkbox" class="form-check-input" id="dropdownCheck">
        <label class="form-check-label" for="dropdownCheck">
          Remember me
        </label>
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Sign in</button>
  </form>
  <div class="dropdown-divider"></div>
  <a class="dropdown-item" href="#">New around here? Sign up</a>
  <a class="dropdown-item" href="#">Forgot password?</a>
</div>

        </div>
        </div>
</nav>
