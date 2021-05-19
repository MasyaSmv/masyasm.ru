<?php

	session_start();

	require_once("dbconnect.php");

	if(isset($_POST["btn_submit_register"])){

		// if(isset($_POST["captcha"])){

			// $captcha = trim($_POST["captcha"]);

			// if($_SESSION["rand_captcha"] != $captcha){

			// 	$message = "<p class='message_error'><strong>Ошибка!</strong> Вы ввели не правильную капчу </p>";
			// 	redirect_to($message, 'site/form_register.php');
			// }

			//======= Обработка имени ============
			if(isset($_POST["first_name"])){

				$first_name = trim($_POST["first_name"]);

				if(!empty($first_name)){

					$first_name = htmlspecialchars($first_name, ENT_QUOTES);
				}else{

					$message = "<p class='message_error'><strong>Ошибка!</strong> Укажите Ваше имя</p>";
					redirect_to($message, 'site/form_register.php');
				}

			}else{

				$message = "<p class='message_error'><strong>Ошибка!</strong> Отсутствует поле с именем </p>";
				redirect_to($message, 'site/form_register.php');
			}

			//======= Обработка фамилии ============
			if(isset($_POST["last_name"])){

				$last_name = trim($_POST["last_name"]);

				if(!empty($last_name)){

					$last_name = htmlspecialchars($last_name, ENT_QUOTES);
				}else{

					$message = "<p class='message_error'><strong>Ошибка!</strong> Укажите Вашу фамилию</p>";
					redirect_to($message, 'site/form_register.php');
				}

			}else{

				$message = "<p class='message_error'><strong>Ошибка!</strong> Отсутствует поле с фамилией </p>";
				redirect_to($message, 'site/form_register.php');
			}

			//======= Обработка адреса электронной почты ============
			if(isset($_POST["email"])){

				$email = trim($_POST["email"]);

				if(!empty($email)){

					$email = htmlspecialchars($email, ENT_QUOTES);

					$reg_email = "/^[a-z0-9][a-z0-9\._-]*[a-z0-9]*@([a-z0-9]+([a-z0-9-]*[a-z0-9]+)*\.)+[a-z]+/i";

					if(!preg_match($reg_email, $email)){

						$message = "<p class='message_error'><strong>Ошибка!</strong> Вы ввели адрес электронной почты в неправильном формате </p>";
						redirect_to($message, 'site/form_register.php');
					}

					$query_select_user = $mysqli->query("SELECT `id` FROM `users` WHERE `email` = '".$email."'");

					if(!$query_select_user){

						$message = "<p class='message_error'><strong>Ошибка!</strong> Ошибка в запросе к Базе Данных, при проверки существования пользователя с таким адресом электронной почты. </p><p>Описание ошибки: $mysqli->error <br /> Код ошибки: $mysqli->errno </p>";
						redirect_to($message, 'site/form_register.php');
					}

					if($query_select_user->num_rows == 1){

						$message =  "<p class='message_error'><strong>Ошибка!</strong> Пользователь с таким адресом электронной почты уже зарегистрирован</p>";
						redirect_to($message, 'site/form_register.php');
					}

				}else{

					$message = "<p class='message_error'><strong>Ошибка!</strong> Укажите адрес Вашей электронной почты</p>";
					redirect_to($message, 'site/form_register.php');
				}

			}else{

				$message = "<p class='message_error'><strong>Ошибка!</strong> Отсутствует поле для ввода адреса электронной почты</p>";
				redirect_to($message, 'site/form_register.php');
			}

			//======= Обработка пароля ============
			if(isset($_POST["password"])){

				$password = trim($_POST["password"]);

				if(!empty($password)){

					$password = htmlspecialchars($password, ENT_QUOTES);

					$password = md5($password."top_secret");
				}else{

					$message = "<p class='message_error'><strong>Ошибка!</strong> Укажите Ваш пароль</p>";
					redirect_to($message, 'site/form_register.php');
				}

			}else{

				$message = "<p class='message_error'><strong>Ошибка!</strong> Отсутствует поле для ввода пароля</p>";
				redirect_to($message, 'site/form_register.php');
			}

			$result_query_insert = $mysqli->query("INSERT INTO `users` (first_name, last_name, email, password) VALUES ('".$first_name."', '".$last_name."', '".$email."', '".$password."') ");

			if(!$result_query_insert){

				$message = "<p class='message_error'><strong>Ошибка!</strong> При регистрации произошла ошибка. </p><p>Описание ошибки: $mysqli->error <br /> Код ошибки: $mysqli->errno </p>";
				redirect_to($message, 'site/form_register.php');

			}else{

				$message = "<p class='success_message'>Регистрация прошла успешно! <br /> Теперь Вы можете авторизоваться используя Ваш адрес электронной почты ( Email ) и пароль </p>";
				redirect_to($message, 'site/form_auth.php');
			}

			$mysqli->close();

		// }else{

			// $message = "<p class='message_error'><strong>Ошибка!</strong> Отсутствует поле для ввода капчи </p>";
			// redirect_to($message, 'site/form_register.php');

		// }

	}else{

		exit("<p><strong>Ошибка!</strong> Вы зашли на эту страницу напрямую, поэтому нет данных для обработки. Вы можете перейти на <a href=".$address_site.">главную страницу</a>.</p>");
	}



?>
