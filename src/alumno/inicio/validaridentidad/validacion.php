<?php
require_once('./../../../../config/mysqli_connect.php');

    $boleta = $_POST['boleta'];
    $sql = "select * from alumno where boleta = '".$boleta."';";
    $result = mysqli_query($conn,$sql);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck>0){
        if ($row = mysqli_fetch_array($result)) {
            echo $row['boleta'];
        }
    } 
?>