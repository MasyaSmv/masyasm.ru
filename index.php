<!DOCTYPE html>
<html lang="ru">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

		<!-- Просто стили -->
		<link rel="stylesheet" type="text/css" href="css/style.css?v=1.0.0.3">

		<!-- Иконка вкладки -->
		<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">

		<!-- Head для Login.php -->
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
		<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
		<link rel="stylesheet" type="text/css" href="css/login.css?v=1.0.0.2">

		<!-- Head для sign_up.php -->
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<link rel="stylesheet" type="text/css" href="css/sign_up.css?v=1.0.0.1">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">

		<!-- Шрифт для имени -->
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">

		<!-- Проверка валидности Email и Password-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="js/validEmail.js"></script>

		<title>MasyaSmerd</title>
	</head>
<body>


	<?php
		require_once("header.php");
	?>



<div class="content">
    <p>Umpa-lumpa</p>

    <iframe width="560" height="315" style="height: 29em; width: -webkit-fill-available;" src="https://www.youtube.com/embed/RNfHTuL2sPU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</div>

<table class="table table-hover table-sklad table-sm table-dark table-responsive-md">
<thead class="thead-dark">
    <tr>
      <th scope="col">Наименование</th>
      <th scope="col">Цвет</th>
      <th scope="col">Длина</th>
      <th scope="col">Поставщик</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="2">Larry the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>

	<?php
		require_once("footer.php");
	?>

</body>
</html>
