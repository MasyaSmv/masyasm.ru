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

<div class="row justify-content-center">
<div class="col-md-6" style="padding-top:3%;">
<div class="card" style="background-color: rgb(24, 26, 27); border-color: rgba(140, 130, 115, 0.13);">
<header class="card-header" style="background-color: rgba(0, 0, 0, 0.03); border-bottom-color: rgba(140, 130, 115, 0.13);">
	<a href="login.php" class="float-right btn btn-outline-primary mt-1">Войти</a>
	<h4 class="card-title mt-2">Зарегистрироваться</h4>
</header>
<div id="sign_up.php">
<article class="card-body">
<form action="register.php" method="POST" name="sign_up.php">
    <div class="form-group">
		<label>Войти</label>
		<input type="text" class="form-control" name="login" required="required" placeholder="">
	</div> <!-- form-group end.// -->
	<div class="form-row">
		<div class="col form-group">
			<label>Имя</label>
		  	<input type="text" class="form-control" name="first_name" required="required" placeholder="">
		</div> <!-- form-group end.// -->
		<div class="col form-group">
			<label>Фамилия</label>
		  	<input type="text" class="form-control" name="last_name" required="required" placeholder=" ">
		</div> <!-- form-group end.// -->
	</div> <!-- form-row end.// -->
	<div class="form-group">
		<label>Email</label>
		<input type="email" class="form-control" name="email" required="required" placeholder="">
		<small class="form-text text-muted">Мы никогда никому не передадим вашу электронную почту.</small>
	</div> <!-- form-group end.// -->
	<div class="form-group">
			<label class="form-check form-check-inline">
		  <input class="form-check-input" type="radio" name="gender" value="option1">
		  <span class="form-check-label"> Мужчина </span>
		</label>
		<label class="form-check form-check-inline">
		  <input class="form-check-input" type="radio" name="gender" value="option2">
		  <span class="form-check-label"> Женщина</span>
		</label>

	</div> <!-- form-group end.// -->
	<div class="form-row">
		<div class="form-group col-md-6">
		  <label>Город</label>
		  <input type="text" class="form-control">
		</div> <!-- form-group end.// -->
		<div class="form-group col-md-6">
		  <label>Страна</label>
		  <select id="inputState" class="form-control">
		    <option> Другая....</option>
		      <option>Узбекистан</option>
		      <option>United States</option>
		      <option selected="">Россия</option>
		      <option>India</option>
		      <option>Afganistan</option>
		  </select>
		</div> <!-- form-group end.// -->
	</div> <!-- form-row.// -->
	<div class="form-group">
		<label>Придумайте пароль</label>
	    <input class="form-control" type="password" name="password" placeholder="минимум 6 символов" required="required">
	</div> <!-- form-group end.// -->
    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block"> Регистрация  </button>
    </div> <!-- form-group// -->
    <small class="text-muted">Нажимая кнопку «Зарегистрироваться», вы подтверждаете, что принимаете наши <br> Условия использования и Политика конфиденциальности.</small>
</form>
</article>
</div> <!-- card-body end .// -->
<div class="border-top card-body text-center" style="border-top-color: rgb(56, 61, 63) !important;;">Уже есть аккаунт? <a href="login.php">Войти</a></div>
</div> <!-- card.// -->
</div> <!-- col.//-->
</div> <!-- row.//-->
</div>
<!--container end.//-->

<?php
    } else {
?>
	<div id="autorized">
		<h2>Вы уже авторизованы</h2>
	</div>
<?php
}
?>
