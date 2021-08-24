<?php
	include('sql_scripts.php');
?>

<head>
	    <!-- Required meta tags -->
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <!-- Просто стили -->
    <link rel="stylesheet" type="text/css" href="/css/style.css?v=1.0.0.3"> <!-- header -->
	<link rel="stylesheet" type="text/css" href="/css/main.css?v=1.0.0.1"> <!-- main -->
	<link rel="stylesheet" type="text/css" href="/css/upload.css?v=1.0.0.0"> <!-- upload -->
	<link rel="stylesheet" type="text/css" href="/css/up_file.css?v=1.0.0.2"> <!-- up_file -->
	<link rel="stylesheet" type="text/css" href="/css/contact_company.css?v=1.0.0.1"> <!-- contact_company -->
	<link rel="stylesheet" type="text/css" href="/css/main_info.css?v=1.0.0.1"> <!-- main_info -->
	<link rel="stylesheet" type="text/css" href="/css/companyinfo.css?v=1.0.0.1"> <!-- companyinfo -->

    <!-- Иконка вкладки -->
    <link rel="icon" href="/img/myfavicon.ico" type="image/x-icon" />
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />

    <!-- Head для form_auth -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/css/login.css?v=1.0.0.3">

	<!-- Jquery test -->
	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>


    <!-- Head для form_register -->
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/css/sign_up.css?v=1.0.0.3">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">

    <!-- Шрифт для имени -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">

	<!-- Скрипт валидации пароля и почты -->
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
      <img src="/img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
      MasyaSmerd
      </a>

	<!-- Кнопка авторизации и выхода -->
	<div id="auth_block">

		<?php
			if(!isset($_SESSION['first_name']) && !isset($_SESSION['password']) || !isset($_SESSION['id'])){
		?>

				<a role="button" class="float-right btn btn-outline-primary btn-log log-in" href="/profile/form_auth.php" id="link_auth"><svg xmlns="http:/.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
</svg>
				Войти</a>
		<?php
			}else{
		?>
					<!-- Картинка-кнопка выхода с выпадающем меню -->
					<div class="btn-group dropleft" id="avatar-btn" aria-haspopup="true">
					<button type="button" class="btn-menu-lc " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<div class="btn-menu-lc-img" >
						<? echo '<img src="/uploads/image/ava/'.$user_arr['photo'].'" width="50" height="50" class="img-name-2c" alt="">' ?>
						</div>
					</button>
					<div class="dropdown-menu links">
						<div class="header-drop-menu">
							<div class="head-avatar-img" id="avatar" width="50" height="50" style="background-color: transparent">
							<? echo '<img src="/uploads/image/ava/'.$user_arr['photo'].'" width="50" height="50" class="img-name-lc" alt="">' ?>
							</div>
							<div class="head-block-name" id="block-name">
								<div class="head-account-name" id="account-name">
									<?php echo $_SESSION['first_name'].' '.$_SESSION['last_name']; ?>
								</div>
								<div class="head-manage-account" id="manage-account">
									<a class="manage-account" href="/profile/personal_area/main.php" rel="nofollow" target="_blank" dir="auto">Личный кабинет</a> <!-- Добавить страницу личного кабинета -->
								</div>
							</div>
						</div>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item outh" href="/profile/logout.php">Выход</a>
					</div>
					</div>
				</div>
		<?php
			}
		?>

	</div>
</div>
