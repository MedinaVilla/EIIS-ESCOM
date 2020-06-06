<?php 
    require_once('./../../../../config/mysqli_connect.php');
    
    $alumnos = [];
    $sql = "select * from alumno;";
    $result = mysqli_query($conn,$sql);
    $resultCheck = mysqli_num_rows($result);
    printf("El resultado tiene %d filas.\n", $resultCheck);
    if($resultCheck>0){
        printf("Entra");
        while($row = mysqli_fetch_assoc($result)){
            $alumnos[] = $row;
        }
    } 
    echo json_encode($alumnos);
?>