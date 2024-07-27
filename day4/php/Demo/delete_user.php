<?php
require "../Connect_ToDB.php";
require "../Data_connection.php";
require "../base.php";

$db = connect_to_database($DB_DATABASE, $DB_HOST, $DB_USER, $DB_PASSWORD);
echo "<h1>Delete User</h1>";
$id_db = $_GET["id"];
$query = "DELETE FROM `users` WHERE id = {$id_db}";
$res = $db->exec($query);
echo "{$res}";

// Corrected header location
header("Location: ../SelectUsers.php");
exit();
?>
