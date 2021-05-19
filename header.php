<?php
	session_start();
?>

<head>
	    <!-- Required meta tags -->
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <!-- Просто стили -->
    <link rel="stylesheet" type="text/css" href="css/style.css?v=1.0.0.4">

    <!-- Иконка вкладки -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">

    <!-- Head для form_auth -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/login.css?v=1.0.0.3">

    <!-- Head для form_register -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/sign_up.css?v=1.0.0.3">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">

    <!-- Шрифт для имени -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			"use strict"

			$("input[name=email]").blur(function(){

				if($(this).val() != ''){

					var email_pattern = /^[a-z0-9][a-z0-9\._-]*[a-z0-9]*@([a-z0-9]+([a-z0-9-]*[a-z0-9]+)*\.)+[a-z]+/i;

					if(!email_pattern.test($(this).val())){

						$('#error_email_message').text('Не правильный формат');

						$('input[type=submit]').attr('disabled', true);
					}else{

						$('#error_email_message').empty();
						$('input[type=submit]').attr('disabled', false);
					}

				}else{
					$('#error_email_message').text('Введите Ваш Email');
					$('input[type=submit]').attr('disabled', true);
				}
			});

			$("input[name=password]").blur(function(){

				if($(this).val().length < 6){

					$('#error_password_message').text('Минимальная длина пароля 6 символов');
					$('input[type=submit]').attr('disabled', true);

				}else{

					$('#error_password_message').empty();
					$('input[type=submit]').attr('disabled', false);
				}

			});

		});
	</script>
</head>

<div id="header">

    <!-- Шапка -->
    <nav class="navbar navbar-dark" style="background-color:#212529">
      <a class="navbar-brand" href="/">
      <img src="img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
      MasyaSmerd
      </a>

	<!-- Кнопка авторизации и выхода -->
	<div id="auth_block">

		<?php
			if(!isset($_SESSION['email']) && !isset($_SESSION['password'])){
		?>
				<!-- <div  id="link_register">
					<a href="form_register.php">Регистрация</a>
				</div> -->

				<div class="float-right btn btn-outline-primary mt-1" id="link_auth">
					<a href="form_auth.php">Войти</a>
				</div>
		<?php
			}else{
		?>
				<div class="float-right btn btn-outline-primary mt-1" id="link_logout">
					<a href="logout.php">Выход</a>
				</div>

				<div>
					Привет <?php echo $_SESSION['first_name'].' '.$_SESSION['last_name']; ?>
				</div>
		<?php
			}
		?>

	</div>
</div>
