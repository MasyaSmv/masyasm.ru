<?php
    require_once("header.php")
?>

  <!-- Блок вывода сообщений -->
  <div class="block_for_message">
    <?php
      if (isset($_SESSION["error_messages"]) && !empty($_SESSION["error_messages"])) {
        echo $_SESSION["error_messages"];

        // Уничтожение ошибки, что бы не появилась при обновлении старницы
        unset($_SESSION["error_messages"]);
      }
      if (isset($_SESSION["success_messages"]) && !empty($_SESSION["success_messages"])) {
        echo $_SESSION["success_messages"];

        // Уничтожение ошибки, что бы не появилась при обновлении страницы
        unset($_SESSION["success_messages"]);
      }
      ?>
  </div>

  <?php
  // Проерка пользователя на авторизацию. Если не авторизован, выводится форма авторизации, если нет, то сообщение что уже авторизован
  if(isset($_SESSION["email"]) && !isset($_SESSION["password"])) {
    ?>



<div class="container" id="form_auth" style="color: white;">
    <div class="kpx_login">
        <h3 class="kpx_authTitle">Войти / <a href="sign_up.php">Зарегистрироваться</a></h3>
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
    </div><br>

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
    </div><br>

		<div class="row kpx_row-sm-offset-3 kpx_loginOr">
			<div class="col-xs-12 col-sm-6">
				<hr class="kpx_hrOr">
				<span class="kpx_spanOr">или</span>
			</div>
		</div>

		<div class="row kpx_row-sm-offset-3">
			<div class="col-xs-12 col-sm-6">
			    <form class="kpx_loginForm" action="auth.php" autocomplete="off" method="POST" name="form_auth">
					<div class="input-group">
						<span class="input-group-addon" id="valid_login_message" class="mesage_error"><span class="fa fa-user"></span></span>
						<input type="text" class="form-control" name="username" placeholder="Логин">
					</div>
                    <hr />

					<div class="input-group">
						<span class="input-group-addon" id="valid_password_message" class="mesage_error"><span class="fa fa-key"></span></span>
						<input  type="password" class="form-control" name="password" placeholder="Минимум 6 символов">
					</div>

          <hr />
					<button class="btn btn-lg btn-outline-primary btn-block" type="submit">Войти</button>
				</form>
			</div>
    	</div>
		<div class="row kpx_row-sm-offset-3">
			<div class="col-xs-12 col-sm-3">
            <p></p>
				<label class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input remember" value="remember-me">
                          <span class="custom-control-indicator"></span>
                          <span class="custom-control-description">Запомнить меня!</span>
                        </label>
                        </p>

			</div>
			<div class="col-xs-12 col-sm-3">
				<p class="kpx_forgotPwd">
					<a href="#">Забыли пароль?</a>
				</p>
			</div>


        </div>
        <script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>
<?php
} else {
  ?>
  <div id="authorized">
    <h2>Вы уже авторизованы</h2>
  </div>
  <?php
}
?>
