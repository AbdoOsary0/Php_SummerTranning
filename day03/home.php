<?php

echo "<h1>Home Page</h1>";
session_start();
echo "<img src={$_SESSION["image_url"]} alt='Green' width=200 height='200' >";
echo "<h1>Hello Mr : {$_SESSION['name']}</h1>";
echo "<br>";
echo "<h3>Email : {$_SESSION['email']}<h3>";
echo "<h3>RoomNumber : {$_SESSION['roomNum']}<h3>";
echo "Exit : {$_SESSION['exit']}<br>";
