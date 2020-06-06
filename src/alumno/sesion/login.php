<?php 
    if(isset($_POST['submit'])){
        $name= $_POST['nomUsu'];
        $pass= $_POST['password'];

        if($name && $pass){
            require_once('./config/mysqli_connect.php');
            $sql = "select * from alumno where boleta='".$name."' AND contraseña='".$pass."';";
            $result = mysqli_query($conn,$sql);
            $resultCheck = mysqli_num_rows($result);
        
            if($resultCheck>0){
                    $row = mysqli_fetch_assoc($result);
                    if($row ["activacion"]==1){
                        session_start();
                        $_SESSION['user'] = $name;
                        header("Location: /materias ");
                
                    }else {
                        header("Location: /verifica");
                    }
                
            } else {

                echo header("Location: /aspirante ");            
                exit;
            }
        } else 
            echo "Datos no valido";
    } else
            header("Location: /");
?>