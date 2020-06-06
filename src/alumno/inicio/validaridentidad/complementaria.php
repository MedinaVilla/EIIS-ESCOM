<?php
session_start();
$boleta=$_SESSION["boleta"];
    if(isset($_POST)){
        
        $correo=$_POST["email"];
        $telefono=$_POST["tel"];
        $contraseña=$_POST["contraseña"];   
        
        //echo $boleta,$correo,$telefono,$contraseña;
        if($correo && $telefono && $contraseña) {
                require_once('./../../../../config/mysqli_connect.php');
                $sql = "UPDATE alumno set correo=?, telefono=?, contraseña=?, fecha_act=?, activacion=? WHERE boleta=?;";
                $stmt = mysqli_prepare($conn,$sql);
                date_default_timezone_set('America/Mexico_City');
                setlocale(LC_TIME, 'es_MX.UTF-8');
                $fecha_act=date("Y-m-d H:i:s"); 
                $activacion=1;
                mysqli_stmt_bind_param($stmt,"ssssss",$correo,$telefono,$contraseña,$fecha_act,$activacion,$boleta);
                mysqli_stmt_execute($stmt);
                $affected_rows = mysqli_stmt_affected_rows($stmt);   
                
                if($affected_rows >= 1){
                    mysqli_stmt_close($stmt);
                    mysqli_close($conn);
                    echo 1; 
                } else {
                    mysqli_error();
                    echo 0;
                }
        }
    }
?>