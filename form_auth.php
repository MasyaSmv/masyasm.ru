<!DOCTYPE html>
<html lang="ru">

	<!-- Имя страницы -->
	<head>
		<title>Страница авторизации</title>
	</head>

	<body>
		<!-- Подключение шапки с линками -->
		<?php
			require_once("header.php");

			// Проверка почты с паролем
			if(!isset($_SESSION['email']) && !isset($_SESSION['password'])){
		?>

		<!-- Блок с выводом сообщений -->
		<div class="block_for_messages">
			<?php
				if(isset($_SESSION["serever_message"])){
					echo $_SESSION["serever_message"];
					unset($_SESSION["serever_message"]);
				}
			?>
		</div>

		<!-- Контайнер всей страницы формы авторизации -->
		<div class="container_form">
			<form action="auth.php" method="POST" name="form_auth" >
			<div class="container" id="form_auth" style="color: white;">

			<!-- Контейнер блока формы авторизации -->
			<div class="kpx_login">
				<!-- Шапка авторизации -->
				<h3 class="kpx_authTitle">Войти / <a href="form_register.php">Зарегистрироваться</a></h3>

			<!-- Кнопки социальный сетей -->
			<div class="row kpx_row-sm-offset-3 kpx_socialButtons">
			<div class="col-xs-2 col-sm-2">
				<a href="#" class="btn btn-lg btn-block kpx_btn-facebook" data-toggle="tooltip" data-placement="top" title="Facebook">
				<i class="fab fa-facebook fa-2x"></i>
				<span class="hidden-xs"></span>
				</a>
			</div>
			<div class="col-xs-2 col-sm-2">
				<a href="#" class="btn btn-lg btn-block kpx_btn-twitter" data-toggle="tooltip" data-placement="top" title="Twitter">
				<i class="fab fa-twitter fa-2x"></i>
				<span class="hidden-xs"></span>
				</a>
			</div>
			<div class="col-xs-2 col-sm-2">
				<a href="#" class="btn btn-lg btn-block kpx_btn-google-plus" data-toggle="tooltip" data-placement="top" title="Google Plus">
				<i class="fab fa-google-plus fa-2x"></i>
				<span class="hidden-xs"></span>
				</a>
			</div>
		</div>

		<br>

		<div class="row kpx_row-sm-offset-3 kpx_socialButtons">
			<div class="col-xs-2 col-sm-2">
				<a href="#" class="btn btn-lg btn-block kpx_btn-github" data-toggle="tooltip" data-placement="top" title="GitHub">
				<i class="fab fa-github fa-2x"></i>
				<span class="hidden-xs"></span>
				</a>
			</div>

			<div class="col-xs-2 col-sm-2">
				<a href="#" class="btn btn-lg btn-block kpx_btn-vk" data-toggle="tooltip" data-placement="top" title="VKontakte">
				<i class="fab fa-vk fa-2x"></i>
				<span class="hidden-xs"></span>
				</a>
			</div>
			<div class="col-xs-2 col-sm-2">
				<a href="#" class="btn btn-lg btn-block kpx_btn-steam" data-toggle="tooltip" data-placement="top" title="Steam">
				<i class="fab fa-steam fa-2x"></i>
				<span class="hidden-xs"></span>
				</a>
			</div>
		</div>

		<br>

		<div class="row kpx_row-sm-offset-3 kpx_loginOr">
			<div class="col-xs-12 col-sm-6">
				<hr class="kpx_hrOr">
				<span class="kpx_spanOr">или</span>
			</div>
		</div>

			<!-- Контейнер вводы почты и пароля -->
			<div class="row kpx_row-sm-offset-3">
				<!-- Блок ввода почты и пароля -->
				<div class="col-xs-12 col-sm-6">
					<form class="kpx_loginForm" action="auth.php" autocomplete="off" method="POST" name="form_auth">
					<div class="input-group">
						<span class="input-group-addon"><span class="fa fa-user"></span></span>
						<input type="email" class="form-control" id="floatingInputGrid" name="email" minlength="2" maxlength="100" required placeholder="example@example.com" />
						<!-- <span id="error_email_message" class="message_error"></span> Сообщение об ошибке почты (некорректно отображается, надо исправить) -->
					</div>

				<hr />

					<div class="input-group">
						<span class="input-group-addon"><span class="fa fa-key"></span></span>
						<input type="password" class="form-control" name="password" minlength="6" maxlength="100" required placeholder="Минимум 6 символов" /><br />
						<!-- <span id="error_password_message" class="message_error"></span> Сообщение об ошибке пароля (некорректно отображается, надо исправить) -->
					</div>

				<hr />

			<!-- Кнопка авторизации -->
			<input class="btn btn-lg btn-outline-primary btn-block" type="submit" name="btn_submit_auth" value="Войти">

				</form>
				</div>
			</div>
			</div>
			</div>
		</div>

		<?php
			} else {
		?>

		<!-- Если пользователь авторизован, выводит сообщение -->
				<div id="authorized">
					<h2>Вы уже авторизованы</h2>
				</div>

		<?php
			}

			// require_once("footer.php");
		?>

	</body>
</html>
