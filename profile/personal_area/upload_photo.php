<?
include ('../../sql_scripts.php');
// include ('../../header.php');

$message = '';
// Загрузка фото пользователя
if (isset($_POST['uploadBtn']) && $_POST['uploadBtn'] == 'Загрузить фото') //если будешь менять value кнопки, то и меняй здесь "загрузить"
{
  if (isset($_FILES['uploadedFile']) && $_FILES['uploadedFile']['error'] === UPLOAD_ERR_OK)
  {
    // детали загруженного файла
    $fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
    $fileName = $_FILES['uploadedFile']['name'];
    $fileSize = $_FILES['uploadedFile']['size'];
    $fileType = $_FILES['uploadedFile']['type'];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));

    // очистка имени файла
    $newFileName = md5(time() . $fileName) . '.' . $fileExtension;

    // проверка расширений файла
    $allowedfileExtensions = array('jpg', 'gif', 'png');

    if (in_array($fileExtension, $allowedfileExtensions))
    {
        // каталог загрузки файла
        $uploadFileDir = 'F:/XAMPP/htdocs/uploads/image/ava/';
        $dest_path = $uploadFileDir . $newFileName;

        if(move_uploaded_file($fileTmpPath, $dest_path))
        {
            $message ='Файл успешно загружен.';
            $bdFile = $mysqli -> query ("UPDATE `users` SET `profile_image` = '$newFileName' WHERE `id` = '{$_SESSION['id']}'");
        }
        else
        {
            $message = 'Произошла ошибка при перемещении файла в каталог для загрузки. Убедитесь, что каталог загрузки доступен для записи веб-сервером.';
        }
    }
    else
    {
        $message = 'Ошибка загрузки. Допустимые типы файлов: ' . implode(',', $allowedfileExtensions);
    }
}
else
{
    $message = 'Ошибка при загрузке файла. Пожалуйста, проверьте следующую ошибку.<br>';
    $message .= 'Ошибка:' . $_FILES['uploadedFile']['error'];
}
$_SESSION['message'] = $message;
header("Location: main.php");
}

// Загрузка лого компании
if (isset($_POST['uploadBtn']) && $_POST['uploadBtn'] == 'Загрузить логотип') //если будешь менять value кнопки, то и меняй здесь "загрузить"
{
  if (isset($_FILES['uploadedFile']) && $_FILES['uploadedFile']['error'] === UPLOAD_ERR_OK)
  {
    // детали загруженного файла
    $fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
    $fileName = $_FILES['uploadedFile']['name'];
    $fileSize = $_FILES['uploadedFile']['size'];
    $fileType = $_FILES['uploadedFile']['type'];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));

    // очистка имени файла
    $newFileName = md5(time() . $fileName) . '.' . $fileExtension;

    // проверка расширений файла
    $allowedfileExtensions = array('jpg', 'gif', 'png');

    if (in_array($fileExtension, $allowedfileExtensions))
    {
        // каталог загрузки файла
        $uploadFileDir = 'F:/XAMPP/htdocs/uploads/image/logo/';
        $dest_path = $uploadFileDir . $newFileName;

        if(move_uploaded_file($fileTmpPath, $dest_path))
        {
            $message ='Файл успешно загружен.';
            $bdFile = $mysqli -> query ("UPDATE `company` SET `logo` = '$newFileName' WHERE title='{$company_arr['compName']}'");
        }
        else
        {
            $message = 'Произошла ошибка при перемещении файла в каталог для загрузки. Убедитесь, что каталог загрузки доступен для записи веб-сервером.';
        }
    }
    else
    {
        $message = 'Ошибка загрузки. Допустимые типы файлов: ' . implode(',', $allowedfileExtensions);
    }
}
else
{
    $message = 'Ошибка при загрузке файла. Пожалуйста, проверьте следующую ошибку.<br>';
    $message .= 'Ошибка:' . $_FILES['uploadedFile']['error'];
}
$_SESSION['message'] = $message;
header("Location: companyinfo.php");
}
// echo 'Некоторая отладочная информация:';
// print "<pre>";
// print_r($_FILES);
// print_r($full_arr);
// echo "</pre>";
