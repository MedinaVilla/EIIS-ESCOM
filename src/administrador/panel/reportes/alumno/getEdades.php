<?php 
    require_once('./../../../../../config/mysqli_connect.php');
    
    $sql = "SELECT YEAR(CURDATE()) - YEAR(fecha_nac) as edad,count(YEAR(CURDATE()) - YEAR(fecha_nac))as cantidad from alumno group by edad;";
    $result = mysqli_query($conn,$sql);
    $resultCheck = mysqli_num_rows($result);
    $edades = [];
    if($resultCheck>0){
        while($row = mysqli_fetch_assoc($result)){
            $edades[] = $row;
        }
    } 
    echo json_encode($edades);
?>