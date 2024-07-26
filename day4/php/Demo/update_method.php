<?php
require "../Connect_ToDB.php";
require "../Data_connection.php";
require "../base.php";

$db = connect_to_database($DB_DATABASE, $DB_HOST, $DB_USER, $DB_PASSWORD);

if ($db) {
  try {

    $newName = $_POST['name'];
    $newEmail = $_POST['email'];
    $newRoom = $_POST['roomNum'];
    $newPassword = $_POST['password'];
    $id = $_POST['id'];
    $query = "UPDATE `users` SET name = :name, email = :email, password = :password, roomNumber = :roomNum WHERE id = :id";
    $smt = $db->prepare($query);
    $smt->bindParam(":name", $newName, PDO::PARAM_STR);
    $smt->bindParam(":email", $newEmail, PDO::PARAM_STR);
    $smt->bindParam(":password", $newPassword, PDO::PARAM_STR);
    $smt->bindParam(":roomNum", $newRoom, PDO::PARAM_INT);
    $smt->bindParam(":id", $id, PDO::PARAM_INT);
    $smt->execute();

    header("Location: ../SelectUsers.php");
    exit();
  } catch (Exception $e) {
    echo $e->getMessage();
  }
} else {
  echo "Database connection failed.";
}
exit();
