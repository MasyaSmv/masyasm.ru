<?php
    require_once("header.php")
?>

<!-- Вывод сообщений -->
<div class="block_for_message">
    <?php
    // Вывод ошибок, если они есть
        if(isset($_SESSION["error_messages"]) && !empty($_SESSION["error_messages"])) {
            echo $_SESSION["error_messages"];
            // Удаление сообщений при обновлении страницы
            unset($_SESSION["error_messages"]);
        }
    // Вывод успешных сообщений
        if(isset($_SESSION["success_messages"]) && !empty($_SESSION["success_messages"])) {
            echo $_SESSION["success_messages"];
            // Удаление сообщений при обновлении страницы
            unset($_SESSION["success_messages"]);
        }
    ?>
</div>

<?php
    // Если пользователь не авторизован, переход на регистарцию
    // Иначе сообщение о том что залогинен
    if (!isset($_SESSION["email"]) && !isset($_SESSION["password"])) {
?>
        <div id="form_register">
            <h2>Форма регистрации</h2>

            <form action="register.php" method="POST" name="form_register">
                <table>
                    <tbody>
                        <tr>
                            <td> Name: </td>
                                <td>
                                    <input type="text" name="first_name" required="required">
                                /td>
                        </tr>

                        <td>
                            <td>Family:</td>
                                <td>
                                    <input type="text" name="last_name" required="required">
                                </td>
                        </td>

                        <td>
                            <td>Email:</td>
                                <td>
                                    <input type="email" name="email" required="required"><br>
                                    <span id="valid_email_message" class="mesage_error"><</span>
                                </td>
                        </td>

                        <tr>
                        <td> Password: </td>
                        <td>
                            <input type="password" name="password" placeholder="минимум 6 символов" required="required"><br>
                            <span id="valid_password_message" class="mesage_error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td> Captcha: </td>
                        <td>
                            <p>
                                <img src="captcha.php" alt="Капча" /> <br><br>
                                <input type="text" name="captcha" placeholder="Проверочный код" required="required">
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" name="btn_submit_register" value="Зарегистрироватся!">
                        </td>
                    </tr>
                </tbody></table>
            </form>
        </div>
<?php
    } else {
?>
        <div id="autorized">
                <h2>Вы уже авторизованы</h2>
        </div>
<?php
}
?>
