<?php 
    require_once('./../../../../config/mysqli_connect.php');
    
    $alumnos = [];
    $sql = "select * from alumno;";
    $result = mysqli_query($conn,$sql);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck>0){
        while($row = mysqli_fetch_assoc($result)){
            $alumnos[] = $row;
        }
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($alumnos);
    } 
    
?>