
<!DOCTYPE html>
<html>
<head>
  <title>Загрузка файла</title>
  <?php include ('../../../header.php'); ?>
</head>
<body>
  <div class="upload_file">
    <?php
      if (isset($_SESSION['message']) && $_SESSION['message'])
      {
        printf('<b>%s</b>', $_SESSION['message']);
        unset($_SESSION['message']);
      }
      print_r($_SESSION['user_id']);
    ?>
    <form  method="POST" action="upload.php" enctype="multipart/form-data">
      <div>
        <span>Upload a File:</span>
        <input type="file" name="uploadedFile" />
      </div>

      <input type="submit" name="uploadBtn" value="Upload" />
    </form>
  </div>
</body>
</html>