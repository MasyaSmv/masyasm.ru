<?php

	session_start();

	unset($_SESSION['email']);
	unset($_SESSION['password']);

	header("HTTP/1.1 301 Moved Permanently");

	header("Location: http://localhost/site/");
	redirect_to($message, '/site/profile/form_auth.php');
?>
