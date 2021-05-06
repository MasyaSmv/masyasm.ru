<?php
    require_once("header.php")
?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/login.css?v=1.0.0.2">
<!------ Include the above in your HEAD tag ---------->

<div class="container" style="color: white;">


    <div class="kpx_login">
        <h3 class="kpx_authTitle">Войти / <a href="sign_up.php">Зарегистрироваться</a></h3>
        <div class="row kpx_row-sm-offset-3 kpx_socialButtons">
          <div class="col-xs-2 col-sm-2">
            <a href="#" class="btn btn-lg btn-block kpx_btn-facebook" data-toggle="tooltip" data-placement="top" title="Facebook">
              <i class="fa fa-facebook fa-2x"></i>
              <span class="hidden-xs"></span>
            </a>
          </div>
          <div class="col-xs-2 col-sm-2">
            <a href="#" class="btn btn-lg btn-block kpx_btn-twitter" data-toggle="tooltip" data-placement="top" title="Twitter">
              <i class="fa fa-twitter fa-2x"></i>
              <span class="hidden-xs"></span>
            </a>
          </div>
          <div class="col-xs-2 col-sm-2">
            <a href="#" class="btn btn-lg btn-block kpx_btn-google-plus" data-toggle="tooltip" data-placement="top" title="Google Plus">
              <i class="fa fa-google-plus fa-2x"></i>
              <span class="hidden-xs"></span>
            </a>
          </div>
    </div><br>

    <div class="row kpx_row-sm-offset-3 kpx_socialButtons">
          <div class="col-xs-2 col-sm-2">
            <a href="#" class="btn btn-lg btn-block kpx_btn-github" data-toggle="tooltip" data-placement="top" title="GitHub">
              <i class="fa fa-github fa-2x"></i>
              <span class="hidden-xs"></span>
            </a>
          </div>
          <div class="col-xs-2 col-sm-2">
            <a href="#" class="btn btn-lg btn-block kpx_btn-vk" data-toggle="tooltip" data-placement="top" title="VKontakte">
              <i class="fa fa-vk fa-2x"></i>
              <span class="hidden-xs"></span>
            </a>
          </div>
          <div class="col-xs-2 col-sm-2">
            <a href="#" class="btn btn-lg btn-block kpx_btn-steam" data-toggle="tooltip" data-placement="top" title="Steam">
              <i class="fa fa-steam fa-2x"></i>
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
			    <form class="kpx_loginForm" action="" autocomplete="off" method="POST">
					<div class="input-group">
						<span class="input-group-addon"><span class="fa fa-user"></span></span>
						<input type="text" class="form-control" name="username" placeholder="Username">
					</div>
                    <hr />

					<div class="input-group">
						<span class="input-group-addon"><span class="fa fa-key"></span></span>
						<input  type="password" class="form-control" name="password" placeholder="Password">
					</div>

          <hr />
					<button class="btn btn-lg btn-outline-primary btn-block" type="submit"><i class="fa fa-sign-in"></i> Войти</button>
				</form>
			</div>
    	</div>
		<div class="row kpx_row-sm-offset-3">
			<div class="col-xs-12 col-sm-3">
            <p></p>
				<label class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" value="remember-me">
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
