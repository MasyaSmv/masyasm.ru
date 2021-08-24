<?php
session_start();
include('dbconnect.php');

// Массив данных данных из таблицы компаний
if (isset($_SESSION['id'])) {
    $company = $mysqli->query("SELECT * FROM `company` WHERE id_user='{$_SESSION['id']}'");
    $company_arr = array();
    while ($row = mysqli_fetch_array($company)) {
        $company_arr['id'] = $row['id'];
        $company_arr['id_user'] = $row['id_user'];
        $company_arr['site'] = $row['site'];
        $company_arr['city_id'] = $row['city_id'];
        $company_arr['state_id'] = $row['state_id'];
        $company_arr['indx'] = $row['indx'];
        $company_arr['street'] = $row['street'];
        $company_arr['home'] = $row['home'];
        $company_arr['ap_off'] = $row['ap_off'];
        $company_arr['compName'] = $row['title'];
        $company_arr['date_add'] = $row['date_add'];
        $company_arr['compPhone'] = $row['numphone'];
        $company_arr['inn'] = $row['inn'];
        $company_arr['compMail'] = $row['email'];
        $company_arr['logo'] = $row['logo'];
        $company_arr['description'] = $row['description'];
    }
}
// Массив данных данных из таблицы юзеров
if (isset($_SESSION['id'])) {
    $user = $mysqli->query("SELECT * FROM `users` WHERE id = '{$_SESSION['id']}'");
    $user_arr = array();
    while ($row = mysqli_fetch_array($user)) {
        $user_arr['id'] = $row['id'];
        $user_arr['name'] = $row['first_name'];
        $user_arr['famaly'] = $row['last_name'];
        $user_arr['email'] = $row['email'];
        $user_arr['eStatus'] = $row['email_status'];
        $user_arr['psw'] = $row['password'];
        $user_arr['company'] = $row['company'];
        $user_arr['photo'] = $row['profile_image'];
    }
}

// Массив данных данных из таблицы городов
$city = $mysqli->query("SELECT * FROM `city_id`");
$city_arr = array();
while ($row = mysqli_fetch_array($city)) {
    $city_arr['id'] = $row['id'];
    $city_arr['city'] = $row['city'];
}

// Массив данных данных из таблицы стран
$state = $mysqli->query("SELECT * FROM `state_id`");
$state_arr = array();
while ($row = mysqli_fetch_array($state)) {
    $state_arr['id'] = $row['id'];
    $state_arr['state_ru'] = $row['state_ru'];
    $state_arr['state_en'] = $row['state_en'];
    $state_arr['code'] = $row['code'];
}

// Массив для проверок данных
if (isset($_SESSION['id'])) {
$full_arr = array();
$full_arr['session'] = $_SESSION;
$full_arr['company'] = $company_arr;
$full_arr['user'] = $user_arr;
}
