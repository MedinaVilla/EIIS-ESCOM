<?php 
    header("Content-Type: text/html;charset=UTF-8");
    require_once('./../../../../config/mysqli_connect.php');
    
    $alumnos = [];
    $sql = "select * from alumno;";
    mysqli_set_charset('utf8', $conn);
    mysqli_query("set names 'utf8'");
    $result = mysqli_query($conn,$sql);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck>0){
        while($row = mysqli_fetch_assoc($result)){
            $alumnos[] = $row;
        }
        printf("entra");
        print_r($alumnos)l
        echo json_encode($alumnos,"utf8_encode");
    } 
    
?>