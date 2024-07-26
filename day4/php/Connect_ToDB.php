<?php

function connect_to_database($DB_DATABASE, $DB_HOST, $DB_USER, $DB_PASSWORD)
{
  $dsn = "mysql:dbname={$DB_DATABASE};host={$DB_HOST};port=3306;"; #port number

  try {
    $db = new PDO($dsn, $DB_USER, $DB_PASSWORD);
    //        var_dump($db);
    return $db;
  } catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
    return false;
  }
}
function display_to_table($rows)
{
  echo '
    <style>
        .table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 18px;
            text-align: left;
        }
        .table th, .table td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }
        .table th {
            background-color: #f2f2f2;
        }
        .table tr:hover {
            background-color: #f5f5f5;
        }
        .btn {
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 5px;
            color: #fff;
        }
        .btn-info {
            background-color: #17a2b8;
        }
        .btn-warning {
            background-color: #ffc107;
        }
        .btn-danger {
            background-color: #dc3545;
        }
        .btn:hover {
            opacity: 0.8;
        }
    </style>
    ';
  echo '<table class="table">  
        <tr> 
            <th>ID</th> 
            <th>Name</th> 
            <th>Password</th> 
            <th>Email</th>
            <th>Show</th> 
            <th>Edit</th> 
            <th>Delete</th> 
        </tr>';

  foreach ($rows as $row) {
    echo $row['image'];
    echo "<tr> 
            <td>{$row['id']}</td>
            <td>{$row['name']}</td>
            <td>{$row['password']}</td>
            <td>{$row['email']}</td>
            <td><img src=\"{$row['image']}\" alt=\"IMAGE\" width=100 height=100> </td>
            <td><a href='' class='btn btn-info'>Show</a></td>
            <td><a href='../register_demo/edit_user.php?id={$row['id']}' class='btn btn-warning'>Edit</a></td>
            <td><a href='../register_demo/delete_user.php?id={$row['id']}' class='btn btn-danger'>Delete</a></td>
        </tr>";
  }
  echo "</table>";
}


function select_all_from_table($db, $tablename)
{
  try {
    $select_query = "select * from `{$tablename}`;";
    $res = $db->query($select_query);
    $rows = $res->fetchAll(PDO::FETCH_ASSOC);  # fetch all rows as assoc. array
    //        var_dump($rows);
    return $rows;
  } catch (Exception $e) {
    return false;
  }
}









//SQLI
// const DB_User = 'root';
// const DB_Password = "2127378";
// const DB_Host = "localhost";
// const DB_Port = 3306;
// const DB_DATABASE = "php_summer";
// $conn = mysqli_connect(DB_Host, 'root', DB_Password, DB_DATABASE, 3306);
// var_dump($conn);

// SQL OOP
// $conn2 = new mysqli(DB_Host, DB_User, DB_Password, DB_DATABASE, 3306);
// var_dump($conn2);

// phpinfo();