<?php 
    session_start();
    require_once('./../../../config/mysqli_connect.php');
    $boleta = $_SESSION['user'];
    $sql = "select * from alumno where boleta='".$boleta."';";
    $result = mysqli_query($conn,$sql);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck>0){
        while($row = mysqli_fetch_assoc($result)){
            $alumnos = $row;
        }
    } else echo "Ninguno";
    echo json_encode($alumnos);