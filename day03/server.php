<?php

echo "Welcome Server";
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
  echo 'data received';
  // echo "User logged in successfully";
  # 1- I will start a session
  session_start();
  # then save username in this session
  $_SESSION['name'] = $_POST['name'];
  $_SESSION['email'] = $_POST['email'];
  $_SESSION['roomNum'] = $_POST['roomNum'];
  $_SESSION['exit'] = $_POST['exit'];
  # then redirect to homepage
  $temp_name = $_FILES['image']['tmp_name'];
  $image_name = $_FILES['image']['name'];

  ### move image to path on the server
  $uploaded = move_uploaded_file($temp_name, "images/{$image_name}");
  if ($uploaded) {
    echo "Successfully saved the image";
    $_SESSION["image_url"] = "images/{$image_name}";
  } else {
    echo "Erro while upload Image";
  }
  header('Location: home.php');
} else {
  $errors_str = json_encode($errors);
  $url = "Location: Form.php?errors={$errors_str}";
  if ($old_data) {
    $old_data = json_encode($old_data);
    $url .= "&old_data={$old_data}";
  }
  header($url);
}
