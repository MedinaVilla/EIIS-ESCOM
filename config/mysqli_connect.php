<?php
  //Database connection variables
  $servername = "us-cdbr-east-05.cleardb.net";
  $username = "bbca97d1250b4e";
  $password = "68027130";
  $dbname  = "heroku_69f1905264af41f";

  // Create connection
  $conn= mysqli_connect($servername, $username, $password, $dbname);
  mysqli_query($conn,"set names 'utf8'");
  mysqli_set_charset('utf8', $conn);

  // Check connection
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }
?>