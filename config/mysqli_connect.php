<?php
  //Database connection variables
  $servername = "localhost";
  $username = "root";
<<<<<<< HEAD
  $password = "N0M3L0";
  $dbname  = "eiis";
=======
  $password = "";
  $dbname  = "registro";
>>>>>>> 7df7eeb115779d1049ef6c10ed0b3e93148d9ae4

  // Create connection
  $conn= mysqli_connect($servername, $username, $password, $dbname);

  // Check connection
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }
?>