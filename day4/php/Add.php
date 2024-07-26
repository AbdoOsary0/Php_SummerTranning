<?php
require "./Connect_ToDB.php";
require "./Data_connection.php";

$db = connect_to_database($DB_DATABASE, $DB_HOST, $DB_USER, $DB_PASSWORD);
$name_db = $_POST['name'];
$email_db = $_POST['email'];
$password_db = $_POST['password'];
$roomNum_db = $_POST['roomNum'];
$image_url_db = $_POST['image_url'];
var_dump($_POST);
// $name_db = "ahmed";
// $email_db = "a@a.com";
// $password_db = '123456789';
// $roomNum_db = '15';
// $image_url_db = "image";
// var_dump($db);
try {
  $insert_quary = "insert into `users`(`name`, `email`, `password`, `roomNumber`,`image`) 
                   VALUES (:name,:email,:password,:roomNumber ,:image)";
  $insert_prepare = $db->prepare($insert_quary);
  $insert_prepare->bindParam('name',  $_POST['name']);
  $insert_prepare->bindParam('email', $_POST['email']);
  $insert_prepare->bindParam('password', $_POST['password']);
  $insert_prepare->bindParam('roomNumber', $_POST['roomNumber']);
  $insert_prepare->bindParam('image',  $_POST['image']);
  $res = $insert_prepare->execute();
  // var_dump($res);
} catch (Exception $e) {
  echo $e->getMessage();
}
