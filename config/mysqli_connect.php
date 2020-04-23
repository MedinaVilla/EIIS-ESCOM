<?php
  //Database connection variables
  $servername = "localhost";
  $username = "nenemalo";
  $password = "jaiba";
  $dbname  = "registro";

  // Create connection
  $conn = mysqli_connect($servername, $username, $password, $dbname);

  // Check connection
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }
?>