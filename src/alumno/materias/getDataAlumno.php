<?php 
    session_start();
    if(isset($_SESSION['user'])){
        require_once('./../../../config/mysqli_connect.php');
        $boleta = $_SESSION['user'];
        $sql = "select * from alumno where boleta='".$boleta."';";
        $result = mysqli_query($conn,$sql);
        $resultCheck = mysqli_num_rows($result);
        if($resultCheck>0){
            while($row = mysqli_fetch_assoc($result)){
                echo $row;
            }
        }
        else{
            echo "No hay nada";
        }
    }
?>