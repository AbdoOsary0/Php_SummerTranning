<?php
require "../Connect_ToDB.php";
require "../Data_connection.php";
require "../base.php";

$db = connect_to_database($DB_DATABASE, $DB_HOST, $DB_USER, $DB_PASSWORD);

if ($db) {
  try {
    $id_db = $_GET["id"];
    $query = "select * from `users` WHERE id = :ID";
    $smt = $db->prepare($query);
    $smt->bindParam(":ID", $id_db, PDO::PARAM_INT);
    $smt->execute();
    $row = $smt->fetch(PDO::FETCH_ASSOC);
  } catch (Exception $th) {
    echo $th->getMessage();
  }
} else {
  echo "error to connect Database";
}
// header("Location: ../SelectUsers.php");
// exit();
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update User</title>
  <link rel="stylesheet" href="../../css/style.css">
</head>

<body>
  <div class="form">
    <form action="./update_method.php" method="post" enctype="multipart/form-data">
      <div class="container">
        <div>
          <h1>Update Data</h1>
        </div>
        <div>
          <label class="inf" for="Name">Name:</label>
          <input id="Name" type="text" name="name" value="<?php echo "{$row['name']}"; ?>" />
        </div>
        <div>
          <label class="inf" for="email">Email</label>
          <input id="Email" type="email" name="email" value="<?php echo "{$row['email']}"; ?>" />
        </div>
        <div>
          <label class="inf" for="password">Password</label>
          <input id="password" name="password" type="password" value="<?php echo "{$row['password']}"; ?>" />
        </div>
        <div>
          <label for="roomNum">Room Number</label>
          <input id="roomNum" type="text" name="roomNum" value="<?php echo "{$row['roomNumber']}"; ?>" />
        </div>
        <div>
          <input type="hidden" name="id" value="<?php echo "{$row['id']}"; ?>" />
        </div>
        <div class="buttons">
          <input type="submit" value="Submit" placeholder="update" />
        </div>
      </div>
    </form>
  </div>
</body>

</html>