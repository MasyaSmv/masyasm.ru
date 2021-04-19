<?php
// кодировка
header('Content-Type: text/html; charset=utf-8');

$server = "localhost";
$username = "root";
$password = "7895123";
$database = "register_bd";

$mysqli = new mysqli($server, $username, $password, $database);

// Проверка ошибки соединения
if ($mysqli -> connect_errno) {
    die("<p><strong>Ошибка подключения к Базе данных</strong></p><p><strong>Код ошибки: </strong>". $mysqli -> connect_errno . "</p><p><strong> Описание ошибки: </strong>". $mysqli ->connect_error. "</p>");
}

// кодировка подключения
$mysqli ->set_charset('utf8');

$address_site = "http://localhost/Registration-and-authorization-on-session/Registration-and-authorization-on-session/"
?>
