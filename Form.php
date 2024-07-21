<?php
echo "<h1>Please Review Your Information</h1>";
echo "<h1>Name : {$_GET['fName']} {$_GET['Lname']}  </h1>";
echo "<h2>UserName :{$_GET['user']}</h2>";
echo "<h2>password:{$_GET['pass']}</h2>";
echo "<h2>Address:{$_GET['Address']}</h2>";
echo "<h2>gender:{$_GET['gender']}</h2>";
for ($i = 0; $i < count($_GET['Favorites']); $i++) {
  $x = $i + 1;
  echo " Hoppy {$x} is {$_GET['Favorites'][$i]} <br>";
}

echo "<h2>Department:{$_GET['department']}</h2>";


var_dump($_GET);


// var_dump($_POST);
