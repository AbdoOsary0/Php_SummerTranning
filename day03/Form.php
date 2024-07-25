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

  <title>Document</title>
</head>

<body>
  <div class="container" style="
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 100px;
      ">
    <form action="server.php" method="post" enctype="multipart/form-data">
      <table>
        <tr>
          <td colspan="2">
            <h1 style="
                  color: red;
                  text-align: center;
                  margin-bottom: 2px;
                  margin-top: 2px;
                  padding: 2px;
                ">
              Registration Form
            </h1>
          </td>
        </tr>
        <tr>
          <td>
            <label class="inf" for="Name">Name</label>
          </td>
          <td>
            <input id="Name" type="text" name="name" value="<?php if (isset($old_data['name'])) {
                                                              echo $old_data['name'];
                                                            } ?>" />

            <?php if (isset($errors['name'])) {
              echo "<td>{$errors['name']}</td>";
            } ?>
        </tr>
        <tr>
          <td>
            <label class=" inf" for="email">Email</label>
          </td>
          <td>
            <input id="Email" type="email" name="email" value=" <?php if (isset($old_data['email'])) {
                                                                  echo $old_data['email'];
                                                                }?>" />
          </td>
          <?php if (isset($errors['email'])) {
            echo "<td>{$errors['email']}</td>";
          } ?>
        </tr>
        <tr>
          <td>
            <label class="inf" for="password">Password</label>
          </td>
          <td>
            <input id="password" name="password" type="password" minlength="8" />
          </td>
          <?php if (isset($errors['password'])) {
            echo "<td>{$errors['password']}</td>";
          } ?>
        </tr>
        <tr>
          <td>
            <label class="inf" for="password">Confirm Password</label>
          </td>
          <td>
            <input id="password" name="confirm_password" type="password" minlength="8" />
          </td>
          <?php if (isset($errors['password'])) {
            echo "<td>{$errors['confirm_password']}</td>";
          } ?>
        </tr>
        <tr>
          <td rowspan="1">Room Number</td>
          <td><input type="text" name="roomNum" value="<?php if (isset($old_data["roomNum"])) {
                                                          echo $old_data["roomNum"];
                                                        } ?>" /></td>
          <?php if (isset($errors['roomNum'])) {
            echo "<td>{$errors['roomNum']}</td>";
          } ?>
        </tr>
        <tr>
          <td>Exit</td>
          <td><input type="text" name="exit" /></td>
        </tr>
        <tr>
          <td>profile picture</td>
          <td><input type="file" name="image" id="image" /></td>
          <?php if (isset($errors['image'])) {
            echo "<td>{$errors['image']}</td>";
          } ?>
        </tr>
        <tr>
          <td colspan="2" style="text-align: center; align-items: center">
            <input type="submit" value="Submit" />
            <input type="reset" value="Reset" onclick="<?php
                                                        $old_data = null;
                                                        ?>" />
          </td>
        </tr>
        <?php if (isset($errors['invaild_Pass_confirm'])) {
          echo "<td>{$errors['invaild_Pass_confirm']}</td>";
        } ?>
      </table>
    </form>

  </div>

</body>

</html>