<?php
require "./Connect_ToDB.php";
require "./Data_connection.php";


$db = connect_to_database($DB_DATABASE, $DB_HOST, $DB_USER, $DB_PASSWORD);
// var_dump($db);
$rows = select_all_from_table($db, "users");
// var_dump($rows);
display_to_table(rows: $rows);
