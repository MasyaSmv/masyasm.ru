<!DOCTYPE html>
<html lang="ru">

	<head>

		<title>Страница регистрации</title>

	</head>

	<body>

		<?php
			require_once("header.php");

			// Проверка почты и пароля
			if(!isset($_SESSION['email']) && !isset($_SESSION['password'])){
		?>
			<!-- Блок с выдачей сообщения сервера -->
			<div class="block_for_messages">
				<?php
					if(isset($_SESSION["serever_message"])){
						echo $_SESSION["serever_message"];
						unset($_SESSION["serever_message"]);
					}
				?>
			</div>

			<!-- Контейнер всей страницы формы регистрации -->
			<div class="row justify-content-center">

			<!-- Контейнер блока формы регистрации -->
			<div class="col-md-6" style="padding-top:3%;">

			<!-- Форма регистрации -->
			<div class="card" style="background-color: rgb(24, 26, 27); border-color: rgba(140, 130, 115, 0.13);">

			<!-- Шапка формы -->
			<header class="card-header" style="background-color: rgba(0, 0, 0, 0.03); border-bottom-color: rgba(140, 130, 115, 0.13);">
				<h4 class="card-title mt-2">Регистрация</h4>
			</header>

			<!-- Блок ввода данных и кнопки -->
			<div id="form_register.php">
				<article class="card-body">
					<form action="register.php" method="POST" name="form_register">
						<div class="form-group">
							<label>Имя:</label>
							<input type="text" class="form-control" name="first_name" minlength="2" maxlength="255" required />
						</div>

						<div class="form-group">
							<label>Фамилия:</label>
							<input type="text" class="form-control" name="last_name" minlength="2" maxlength="255" required />
						</div>

						<div class="form-group">
							<label>Email</label>
							<input type="email" class="form-control" name="email" minlength="2" maxlength="100" required />
							<div id="error_email_message" class="from_registretion message_error"></div> <!-- Сообщение ошибки почты (надо CSS добавить) -->
							<small class="form-text text-muted">Если введешь, тутже окажешься зарегистрированным на всех гей-сайтах.</small>
						</div>

						<div class="form-group">
							<label>Пароль</label>
							<input type="password" class="form-control" name="password" minlength="6" maxlength="100" required placeholder="Минимум 6 символов" />
							<div id="error_password_message" class="form_registration message_error"></div> <!-- Сообщение ошибки пароля (надо CSS добавить) -->
						</div>

						<!-- Кнопка регистрации -->
						<div class="form-group"><br />
							<input class="btn btn-primary btn-block" type="submit" name="btn_submit_register" value="Зарегистрироваться!">
						</div>
						<small class="text-muted">Давай тыкай. Мне нужно твое бабло</small>
					</form>
				</article>
			</div>

			<!-- Кнопка входа для уже зарегистрированных -->
			<div class="border-top card-body text-center" style="border-top-color: rgb(56, 61, 63) !important;;">Уже есть аккаунт? <a href="form_auth.php">Войти</a></div>
		<?php
			} else {
		?>

		<!-- Если пользователь авторизован, выводит сообщение -->
			<div id="authorized">
				<h2>Вы уже зарегистрированы</h2>
			</div>

		<?php
			}
		?>
	</body>
</html>
