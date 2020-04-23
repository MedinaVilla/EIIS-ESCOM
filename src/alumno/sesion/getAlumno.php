<?php 
    //require_once('./config/mysqli_connect.php');
    session_start();
    if(isset($_SESSION['user'])){
        echo $_SESSION['user'];
        /*
        $boleta = $_SESSION['user'];
        $sql = "select nombre from alumno where boleta='".$boleta."';";
        $result = mysqli_query($conn,$sql);
        $resultCheck = mysqli_num_rows($result);
        if($resultCheck>0){
            echo $result;
        }*/
    }
?>