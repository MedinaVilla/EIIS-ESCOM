<?php
    session_start();
    $boleta = $_SESSION['user'];
    require_once('./../../../config/mysqli_connect.php');
    $alumno;
    $sql = "select * from alumno where boleta='".$boleta."';";
    $result = mysqli_query($conn,$sql);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck>0){
        /*while($row = mysqli_fetch_assoc($result)){
            $alumno = $row;
        }*/
        echo "Sí la encontre";
    } 
    else{
        echo "No la encontre";
    }
?>