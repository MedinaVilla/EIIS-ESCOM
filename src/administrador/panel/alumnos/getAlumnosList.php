<?php 
    // header("Content-Type: text/html; charset=utf-8");
    require_once('./../../../../config/mysqli_connect.php');
    
    $alumnos = [];
    $sql = "select * from alumno;";
    mysql_set_charset('utf8', $conn);
    $result = mysqli_query($conn,$sql);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck>0){
        while($row = mysqli_fetch_assoc($result)){
            $alumnos[] = $row;
        }
        printf("entra");
        print_r($alumnos);
        echo json_encode($alumnos,JSON_FORCE_OBJECT);
    } 
    
?>