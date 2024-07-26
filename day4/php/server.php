<?php
require "./Connect_ToDB.php";
require "./Data_connection.php";
$db = connect_to_database($DB_DATABASE, $DB_HOST, $DB_USER, $DB_PASSWORD);

echo "<h1>Welcome Server</h1>";
$errors = [];
$old_data = [];
if (isset($_POST["email"]) && empty($_POST["email"])) {
  $errors["email"] = "email is required";
} elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
  $errors["email"] = "Invalid email format";
} else {
  $old_data["email"] = $_POST["email"];
}

if (isset($_POST["name"]) && empty($_POST["name"])) {
  $errors["name"] = "name is required";
} else {
  $old_data["name"] = $_POST["name"];
}

if (isset($_POST["roomNum"]) && empty($_POST["roomNum"])) {
  $errors["roomNum"] = "roomNum is required";
} else {
  $old_data["roomNum"] = $_POST["roomNum"];
}

if (isset($_POST["password"])) {
  if (empty($_POST["password"])) {
    $errors["password"] = "password is required";
  } elseif (strlen($_POST["password"]) < 8) {
    $errors["password"] = "Password must be at least 8 characters long";
  }
}
if (isset($_POST["confirm_password"])) {
  if (empty($_POST["confirm_password"])) {
    $errors["confirm_password"] = "confirm_password is required";
  } elseif (strlen($_POST["confirm_password"]) < 8) {
    $errors["confirm_password"] = "confirm_password must be at least 8 characters long";
  }
}
if ($_POST["confirm_password"] !== $_POST["password"]) {
  $errors["invaild_Pass_confirm"] = "Password and confirm password are Different";
}
if (isset($_FILES['image']) and empty($_FILES['image']['tmp_name'])) {
  $errors['image'] = 'Image required';
} else {
  $extension = pathinfo($_FILES['image']['name'])['extension'];
  if (!in_array($extension, ["jpg", "png", "jpeg", "gif"])) {
    $errors['image'] = 'the uploaded file is not a jpg or png image';
  }
}


if (count($errors) == 0) {
  echo '<br>data received<br>';
  $temp_name = $_FILES['image']['tmp_name'];
  $image_name = $_FILES['image']['name'];
  ### move image to path on the server
  $uploaded = move_uploaded_file($temp_name, "../images/{$image_name}");
  if ($uploaded) {
    echo "Successfully saved the image";
    // $_POST["image_url"] = "../images/{$image_name}";
  } else {
    echo "Erro while upload Image";
  }
  try {
    $insert_quary = "insert into `users`(`name`, `email`, `password`, `roomNumber`,`image`) 
                     VALUES (:name,:email,:password,:roomNumber ,:image)";
    $insert_prepare = $db->prepare($insert_quary);
    $insert_prepare->bindParam('name',  $_POST['name']);
    $insert_prepare->bindParam('email', $_POST['email']);
    $insert_prepare->bindParam('password', $_POST['password']);
    $insert_prepare->bindParam('roomNumber', $_POST['roomNum']);
    $insert_prepare->bindParam('image',  $_POST['image_url']);
    $res = $insert_prepare->execute();
    // var_dump($res);
  } catch (Exception $e) {
    echo $e->getMessage();
  }

  header('Location : ./SelectUsers.php');
  // header('Location: ../php/CradOP/Add.php');
} else {
  $errors_str = json_encode($errors);
  $url = "Location: Form.php?errors={$errors_str}";
  if ($old_data) {
    $old_data = json_encode($old_data);
    $url .= "&old_data={$old_data}";
  }
  header($url);
}
