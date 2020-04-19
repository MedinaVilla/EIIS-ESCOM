<?php
require_once('./../../../../config/mysqli_connect.php');
session_start();
    $_SESSION["boleta"]=$_POST["boleta"];
    $boleta = $_POST['boleta'];
    $sql = "select * from alumno where boleta = '".$boleta."';";
    $result = mysqli_query($conn,$sql);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck>0){
        $verificacion = 1;
        $sql2 = "select activacion from alumno where boleta='".$boleta."' AND activacion = '".$verificacion."';";
        $result2 = mysqli_query($conn,$sql2);
        $resultCheck2 = mysqli_num_rows($result2);
        if($resultCheck2==0){
            if ($row = mysqli_fetch_array($result)) {
                //echo $row['boleta'];
                echo 1;
            }
        }else {
            echo 2;   
        }
    } else{
        echo 3;
    }
    
?>