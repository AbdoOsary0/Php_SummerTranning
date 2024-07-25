<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/home.css">
  <title>Profile Page</title>
</head>

<body>
  <div class="container">
    <h1>Profile Page</h1>
    <img src="<?php echo $_SESSION['image_url']; ?>" alt="Profile Picture" width="200" height="200">
    <h1>Hello Mr. <?php echo $_SESSION['name']; ?></h1>
    <div class="info">
      <h3>Email: <?php echo $_SESSION['email']; ?></h3>
      <h3>Room Number: <?php echo $_SESSION['roomNum']; ?></h3>
      <h3>Exit: <?php echo $_SESSION['exit']; ?></h3>
    </div>
    <!-- <a href="logout.php">Logout</a> -->
  </div>
</body>

</html>