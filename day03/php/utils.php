<?php



// function append_line($filename, $line)
// {
//   $fileobj = fopen($filename, "a");
//   if ($fileobj) {
//     fwrite($fileobj, $line);
//     fclose($fileobj);
//     return true;
//   }
//   false;
// }


// function display_data_into_table($filename)
// {
//   # read data into array ?
//   $data = file($filename); # array of string
//   if ($data) {
//     echo "<table class='table'> 
//       <tr> 
//         <th> Name</th>
//         <th> Email</th> 
//         <th> Password</th>
//         <th>Room Number</th> 
//         <th> Ext.</th>
//        </tr> ";
//     foreach ($data as $line) {
//       echo "<tr>";
//       $line = trim($line);
//       $line_data = explode(":", $line);
//       foreach ($line_data as $val) {
//         echo "<td> {$val} </td>";
//       }
//       echo "</tr>";
//     }

//     echo "</table>";
//   }
// }
