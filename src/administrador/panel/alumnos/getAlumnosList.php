<?php 
    require_once('./../../../../config/mysqli_connect.php');
    
    $sql = "select * from alumno";
    $result = mysqli_query($conn,$sql);
    $resultCheck = mysqli_num_rows($result);
    printf("El resultado tiene %d filas.\n", $resultCheck);
    $alumnos = [];
    if($resultCheck>0){
        while($row = mysqli_fetch_assoc($result)){
            $alumnos[] = $row;
        }
    } 
    echo json_encode($alumnos);
?>