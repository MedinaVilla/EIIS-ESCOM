<?php 
    require_once('./../../../../config/mysqli_connect.php');
    
    $sql = "select * from alumnos;";
    $result = mysqli_query($conn,$sql);
    $resultCheck = mysqli_num_rows($result);
    $alumnos = [];
    if($resultCheck>0){
        while($row = mysqli_fetch_assoc($result)){
            $alumnos[] = $row;
        }
    } else echo "Ninguno";
    echo json_encode($alumnos);
?>