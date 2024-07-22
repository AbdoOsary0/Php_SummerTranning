<?php
echo "<h1>Hello Here is Data of Users</h1>";


function ShowDate($file_name)
{
  $file = fopen($file_name, "r");
  echo "<table class='table' border=1>";
  echo "<tr>
    <th>Fisrt_Name</th>
    <th>Last_Name</th>
    <th>Address</th>
    <th>gender</th>
    <th>Country</th>
    <th>User_Name</th>
    <th>Password</th>
    <th>Department</th>
    <th>Favorites</th>
    </tr>";

  while (!feof($file)) {
    $line = fgets($file);
    $line = trim($line);
    if ($line == "") {
      continue;
    }
    $array = explode(":", $line);
    // var_dump($value);
    echo "<tr>";
    foreach ($array as $val) {
      echo "<td>{$val}</td>";
    }
    echo "</tr>";
  }
  echo "</table>";
  fclose($file);
}
ShowDate("users.txt");

echo "<h1>Hello Here is Data of Users</h1>";
