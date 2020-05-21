<?php

    if(isset($_POST)){
        $nombre=$_POST["name"];
        $paterno=$_POST["namep"];
        $materno=$_POST["namem"];
        $fecha_nac=$_POST["daten"];        
        $curp=$_POST["curp"];
        $boleta=$_POST["boleta"];
        $telefono=$_POST["tel"];
        $email=$_POST["email"];
        $contraseña=$_POST["contraseña"];
        

        if($nombre && $paterno && $materno && $fecha_nac && $curp && $boleta && $telefono && $email && $contraseña) {
            require_once('./../../../../config/mysqli_connect.php');
            require_once( './../../../../config/funcs.php');
                
            $sql = "select * from alumno where boleta='".$boleta."';";
            $result = mysqli_query($conn,$sql);
            $resultCheck = mysqli_num_rows($result);
            if($resultCheck==0){
                $sql = "select * from alumno where curp='".$curp."';";
                $result = mysqli_query($conn,$sql);
                $resultCheck = mysqli_num_rows($result);
                if($resultCheck==0){
                    $sql = "INSERT INTO alumno (boleta,nombre,apellidop,apellidom,correo,telefono,contraseña,curp,fecha_nac,fecha_act,activacion,token) values(?,?,?,?,?,?,?,?,?,?,?,?);";
                    $stmt = mysqli_prepare($conn,$sql);
                    date_default_timezone_set('America/Mexico_City');
                    setlocale(LC_TIME, 'es_MX.UTF-8');
                    $Fecha_registro=date("Y-m-d H:i:s");
                    $activacion=1;
                    //$pass_hash = hashPassword($contraseña);
				    $token = generateToken();

                        // i Integers
                        // d Doubles
                        // b Blobs
                        // s Everything Else
                    mysqli_stmt_bind_param($stmt,"ssssssssssss",$boleta,$nombre,$paterno,$materno,$email,$telefono, $contraseña,$curp,$fecha_nac,$Fecha_registro,$activacion,$token);
                    mysqli_stmt_execute($stmt);
                    $affected_rows = mysqli_stmt_affected_rows($stmt);
                
                    if($affected_rows == 1){
                        echo 1;
                        mysqli_stmt_close($stmt);
                        
                    } else{
                        echo "nel perrazo";
                        echo mysqli_error($conn) . "\n";
                        
                    }
                }else{
                echo 3;
                }    
            } else{
                echo 4;
                }        
        }
    }
?>