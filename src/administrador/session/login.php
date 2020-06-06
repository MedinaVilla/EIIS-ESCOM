<?php 
    $name= $_POST['numAdmin'];
    $pass= $_POST['password'];

    if($name && $pass){
        require_once('/config/mysqli_connect.php');
        $sql = "select * from administrador where numadmin='".$name."'AND contraseña='".$pass."';";
        $result = mysqli_query($conn,$sql);
        $resultCheck = mysqli_num_rows($result);
    
        if($resultCheck>0){
            if($row = mysqli_fetch_assoc($result)){
                // session_start();
                // $_SESSION['user'] = $name;
                // echo 1;
            echo 0;

            }
        } else {
            session_start();
                $_SESSION['user'] = $name;
                echo 1;
            // echo 0;
        }
    } else 
        echo "Datos no valido";
?>