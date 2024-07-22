<?php

echo "<h1>hello world</h1>";
// var_dump($_POST);
get_date();
echo "<br>";
echo "<br>";
echo "<br>";
echo "<a href='Users.php' style='color: white;
            background-color: black;
            width: 20%;
            text-decoration: none;
            padding: 10px 20px;
            text-align: center;
            display: inline-block;
            border-radius: 5px;
            font-size: 16px;
          '>Show Users_Date <a/>";

function get_date()
{
  if (
    !empty($_POST["First_Name"]) && !empty($_POST["Last_Name"]) && !empty($_POST["Address"]) && !empty($_POST["gender"]) &&
    !empty($_POST["Country"]) && !empty($_POST["user"]) && !empty($_POST["password"]) &&
    !empty($_POST["department"]) && !empty($_POST["Favorites"])
  ) {
    $data = "{$_POST['First_Name']}:{$_POST['Last_Name']}:{$_POST['Address']}:{$_POST['gender']}:{$_POST['Country']}:{$_POST['user']}:{$_POST['password']}:{$_POST['department']}:";
    foreach ($_POST["Favorites"]  as $value) {
      $data = $data  . $value . ",";
    }
    $data = $data . "\n";

    // var_dump($data);
    Save_Data("users.txt", $data);
  } else {
    echo "False";
  }
}

function Save_Data($file_name, $date)
{
  $file = fopen($file_name, 'a');
  if ($file) {
    $success = fwrite($file, $date);
    if ($success) {
      echo "Add Date Successfully";
    } else {
      echo "Error While add Date";
    }
    fclose($file);
  } else {
    echo "Can't not Open file or Can't find it";
  }
}
