<?php
  //Database connection variables
  $servername = "localhost";
  $username = "root";
  $password = "Cchac571";
  $dbname  = "registro";

  // Create connection
  $conn= mysqli_connect($servername, $username, $password, $dbname);

  // Check connection
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }
?>