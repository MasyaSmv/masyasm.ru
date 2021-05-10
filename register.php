<?php
    //Запуск сессии
    session_start();

    //Файл подключения к БД
    require_once("bdconnect.php");

    //Ячейка сообщений ошибок
    $_SESSION["error_message"] = '';

    //Ячейка сообщений успеха
    $_SESSION["success_message"] = '';
?>

<?php
    //Проверка нажатия кнопки зарегистрироваться. Если нет, выведет особщение что зашел на страницу напрямую
    if(isset($_POST["btn_submit_register"]) && !empty($_POST["btn_submit_register"])) {
        //Проверка на данные в массиве POST. Если есть, заключаем в переменные

                    /*=============FIRST_NAME============*/

        if(isset($_POST["first_name"])){

            //Обрезка пробелов с двух концов строки
            $first_name = trim($_POST["first_name"]);

            //Проверка переменной на пустоту
            if (!empty($first_name)) {
                //Преобразование специальных символов в HTML сущности
                $first_name = htmlspecialchars($first_name, ENT_QUOTES);
            } else {
                //Сохранение ошибки в сессии
                $_SESSION["error_messages"] .= "<p class='message_error'>Укажите Ваше имя</p>";

                //Возвращение пользователя на старницу регистрации
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: ".$address_site."/sign_up.php");

                //Остановка скрипта
                exit();
            }
        } else {
            //Сохранение ошибки в сессии
            $_SESSION["error_messages"] .= "<p class='message_error'>Отсутствует поле с именем</p>";

            //Возвращение пользователя на старницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: ".$address_site."/sign_up.php");

            //Остановка скрипта
            exit();
        }

                        /*=============LAST_NAME============*/

        if (isset($_POST["last_name"])) {

            //Обрезка пробелов с двух концов строки
            $last_name = trim($_POST["last_name"]);

            //Проверка переменной на пустоту
            if (!empty($last_name)) {
                //Преобразование специальных символов в HTML сущности
                $last_name = htmlspecialchars($last_name, ENT_QUOTES);
            } else {
                //Сохранение ошибки в сессии
                $_SESSION["error_messages"] .= "<p class='message_error'>Укажите Вашу фамилию</p>";

                //Возвращение пользователя на старницу регистрации
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: ".$address_site."/sign_up.php");

                //Остановка скрипта
                exit();
            }
        } else {
            //Сохранение ошибки в сессии
            $_SESSION["error_messages"] .= "<p class='message_error'>Отсутствует поле с фамилией</p>";

            //Возвращение пользователя на старницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: ".$address_site."/sign_up.php");

            //Остановка скрипта
            exit();
        }

                /*=============EMAIL============*/

        if (isset($_POST["email"])) {
            //Обрезка пробелов с обоих концов строки
            $email = trim($_POST["email"]);

            if (!empty($email)) {
                $email = htmlspecialchars($email, ENT_QUOTES);

                //Проверяем формат полученного почтового адреса с помощью регулярного выражения
                $reg_email = "/^[a-z0-9][a-z0-9\._-]*[a-z0-9]*@([a-z0-9]+([a-z0-9-]*[a-z0-9]+)*\.)+[a-z]+/i";

                //Если формат полученного почтового адреса не соответствует регулярному выражению
                if (!preg_match($reg_email, $email)) {
                    //Сохраняем в сессию сообщение об ошибке
                    $_SESSION["error_messages"] .= "<p class='message_error'>Вы ввели неправильный email</p>";

                    //Возвращение пользователя на главную страницу
                    header("HTTP/1.1 301 Moved Permanently");
                    header("Location: ".$address_site."/sign_up.php");

                    //Останавливаем скрипт
                    exit();
                }

                //Проверяем нет ли такого же адреса в БД
                $result_query = $mysqli -> query("SELECT `email` FROM `users2` WHERE `email` = '".$email."`");

                //Если количество полученных строк равно единице, значит пользователь уже существует
                if ($result_query->num_rows == 1) {

                    //Если полученный результат не равен false
                    if (($row = $result_query->fetch_assoc()) != false) {

                        //Сохраняем в сессию сообщение об ошибке
                        $_SESSION["error_messages"] .= "<p class='message_error'>Пользователь с таким почтовым адресом уже зарегистрирован</p>";

                        //Возвращение пользователя на главную страницу
                        header("HTTP/1.1 301 Moved Permanently");
                        header("Location: ".$address_site."/sign_up.php");
                    } else {
                        //Сохраняем сооббщение об ошибки в сессию
                        $_SESSION["error_messages"] .= "<p class='mesage_error'>Ошибка в запросе к БД</p>";

                        //Возвращение пользователя на главную страницу
                        header("HTTP/1.1 301 Moved Permanently");
                        header("Location: ".$address_site."/sign_up.php");
                    }
                    //Закрытие выборки
                    $result_query->close();

                    //Останавливаем скрипт
                    exit();
                }
                $result_query->close();
            } else {
                //Сохранение об ошибке в сессию
                $_SESSION["error_messages"] .= "<p class='message_error'>Укажие Ваш email</p>";

                //Возвращение пользователя на главную страницу
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: ".$address_site."/sign_up.php");

                //Останавливаем скрипт
                exit();
            }
        } else {
            //Сохранение об ошибке в сессию
            $_SESSION["error_messages"] .= "<p class='message_error'>отсутствует поле ддял ввода Email</p>";

            //Возвращение пользователя на главную страницу
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: ".$address_site."/sign_up.php");

            //Останавливаем скрипт
            exit();
        }

                /*=============PASSWORD============*/

        if (isset($_POST["password"])) {
            //Обрезаем пробелы с начала и с конца строки
            $password = trim($_POST["password"]);

            if(!empty($password)){
            $password = htmlspecialchars($password, ENT_QUOTES);

            //Шифруем папроль
            $password = md5($password."top_secret");
        }else{
            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error'>Укажите Ваш пароль</p>";

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: ".$address_site."/sign_up.php");

            //Останавливаем  скрипт
            exit();
    }
        }else{
            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error'>Отсутствует поле для ввода пароля</p>";

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: ".$address_site."/sign_up.php");

            //Останавливаем  скрипт
            exit();
        }

        //Запрос на добавления пользователя в БД
        $result_query_insert = $mysqli->query("INSERT INTO `users2` (first_name, last_name, email, password) VALUES ('".$first_name."', '".$last_name."', '".$email."', '".$password."')");

        if (!$result_query_insert) {
            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error' >Ошибка запроса на добавления пользователя в БД</p>";

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: ".$address_site."/sign_up.php");

            //Останавливаем  скрипт
            exit();
        }else{

            $_SESSION["success_messages"] = "<p class='success_message'>Регистрация прошла успешно!!! <br />Теперь Вы можете авторизоваться используя Ваш логин и пароль.</p>";

            //Отправляем пользователя на страницу авторизации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: ".$address_site."/login.php");
        }

        /* Завершение запроса */
        $result_query_insert->close();

        //Закрываем подключение к БД
        $mysqli->close();

        } else {
        exit("<p><strong>Ошибка!</strong>Вы зашли на эту страницу напрямую, по этому нет данных для обработки. Вы можете перейти на <a href=".$address_site.">главную страницу</a>.</p>");
    }
?>
