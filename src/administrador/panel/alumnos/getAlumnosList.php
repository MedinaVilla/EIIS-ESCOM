<?php 
    // header("Content-Type: text/html;charset=UTF-8");
    require_once('./../../../../config/mysqli_connect.php');
    
    $alumnos = [];
    $sql = "select * from alumno;";
    $result = mysqli_query($conn,$sql);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck>0){
        while($row = mysqli_fetch_assoc($result)){
            $alumnos[] = $row;
        }
        echo json_encode($alumnos);
    } 
    
?>