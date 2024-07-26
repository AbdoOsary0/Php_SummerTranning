<?php

if (isset($_GET['errors'])) {
  $errors = json_decode($_GET['errors'], true);
  if (isset($_GET['old_data'])) {
    $old_data = json_decode($_GET['old_data'], true);
  }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/style.css">
  <title>Document</title>
</head>

<body>

  <div class="form">
    <form action="server.php" method="post" enctype="multipart/form-data">
      <div class="container">
        <div>
          <h1>
            Registration Form
          </h1>
        </div>
        <div>
          <label class="inf" for="Name">Name:</label>
          <input id="Name" type="text" name="name" value="<?php if (isset($old_data['name'])) {
                                                            echo $old_data['name'];
                                                          } ?>" />
          <?php if (isset($errors['name'])) {
            echo "<div class='error'>{$errors['name']}";
          } ?>
        </div>
        <div>
          <label class=" inf" for="email">Email</label>
          <input id="Email" type="email" name="email" value=" <?php if (isset($old_data['email'])) {
                                                                echo $old_data['email'];
                                                              } ?>" />
          <?php if (isset($errors['email'])) {
            echo "<div class='error'>{$errors['email']}";
          } ?>
        </div>
        <div>
          <label class="inf" for="password">Password</label>
          <input id="password" name="password" type="password" />
          <?php if (isset($errors['password'])) {
            echo "<div class='error'>{$errors['password']}";
          } ?>
        </div>
        <div>
          <label class="inf" for="password">Confirm Password</label>
          <input id="password" name="confirm_password" type="password" />
          <?php if (isset($errors['confirm_password'])) {
            echo "<div class='error'>{$errors['confirm_password']}";
          } ?>
        </div>
        <div>
          <?php if (isset($errors['invaild_Pass_confirm'])) {
            echo "<div class='error'>{$errors['invaild_Pass_confirm']}";
          } ?>
        </div>
        <div>
          <label for="">RoomNum</label>
          <input type="text" name="roomNum" value="<?php if (isset($old_data["roomNum"])) {
                                                      echo $old_data["roomNum"];
                                                    } ?>" />
          <?php if (isset($errors['roomNum'])) {
            echo "<div class='error'>{$errors['roomNum']}";
          } ?>
        </div>
        <div>
          <label for="">Exit</label>
          <input type="text" name="exit" />
        </div>
        <div><label for="image">profile picture</label>
          <input type="file" name="image" id="image" />
          <?php if (isset($errors['image'])) {
            echo "<div class='error'>{$errors['image']}";
          } ?>
        </div>
        <div class="buttons"> <input type="submit" value="Submit" />
          <input type="reset" value="Reset" />
        </div>
      </div>
    </form>
  </div>
</body>

</html>