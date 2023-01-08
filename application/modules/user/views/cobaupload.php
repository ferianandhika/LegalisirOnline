<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <?php echo form_open_multipart('user/cobaupload/save') ?>

  <label for="varchar">upload file</label>
  <input type="file" name="file">
  <br>
  <button type="submit">upload file</button>

  <?php echo form_close() ?>
</body>

</html>