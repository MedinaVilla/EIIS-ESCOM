<?php
  //Database connection variables
  $servername = "localhost";
  $username = "root";
  $password = "N0M3L0";
  $dbname  = "alumnos";

  // Create connection
  $conn = mysqli_connect($servername, $username, $password, $dbname);

  // Check connection
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }
?>