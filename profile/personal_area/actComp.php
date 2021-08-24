<?php

include '../../sql_scripts.php';

// Скрипт для мобильного телефона
if (isset($_POST["btn_comp_text"])) {
    $description = $_POST["compText"];
    if (strip_tags($description)) {
        // Условие (если в сесси нет записи телефона - записывает в бд)/(если есть запись в сессии - обновляет по айдишнику)
        if ($_SESSION['compText'] === 0) {
            $sqlComNum = "INSERT INTO company (description, id) VALUES('$description', '{$company_arr['id']}')";
            $mysqli->query($sqlComNum);
        } else {
            $sqlComNum = "UPDATE company SET description='$description' WHERE id='{$company_arr['id']}'";
            $mysqli->query($sqlComNum);
        }
        header("Location: companyinfo.php");
    } else {
        echo ('Слышь, ты! Ублюдок! Мать твою! А ну иди сюда....');
    }
    echo '<pre>';
    var_dump($description);
    exit();
}
