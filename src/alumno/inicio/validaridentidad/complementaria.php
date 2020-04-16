<?php
    if(isset($_POST)){
        $correo=$_POST["email"];
        $telefono=$_POST["tel"];
        $nombre=$_POST["name"];        

        if($correo && $telefono && $contraseña) {
                require_once('./../../config/mysqli_connect.php');
                $sql = "select * from alumno where boleta='".$boleta."';";
                $result = mysqli_query($conn,$sql);
                $resultCheck = mysqli_num_rows($result);
                
                if($resultCheck==0){
                $sql = "INSERT INTO alumno(correo,telefono,contraseña,fecha_act) values(?,?,?,?);";
                $stmt = mysqli_prepare($conn,$sql);
                date_default_timezone_set('America/Mexico_City');
                setlocale(LC_TIME, 'es_MX.UTF-8');
                $fecha_act=date("Y-m-d H:i:s");       
                

                mysqli_stmt_bind_param($stmt,"ssss",$correo,$telefono,$contraseña,$fecha_act);
                mysqli_stmt_execute($stmt);
                $affected_rows = mysqli_stmt_affected_rows($stmt);
            
                if($affected_rows == 1){
                    echo "Alumno Registrado Exitosamente";
                    mysqli_stmt_close($stmt);
                    $sql = "select fecha,salon,horaInicio,horaFin from examen INNER JOIN salon on examen.Salon_idSalon=salon.idSalon INNER JOIN fecha ON examen.Fecha_idFecha = fecha.idFecha INNER JOIN horario ON examen.Horario_idHorario = horario.idHorario where idExamen = ".$idexamen.";";
                    $result = mysqli_query($conn,$sql);
                    $resultCheck = mysqli_num_rows($result);
                    $salon = "";
                    $horario = "";
                    $fecha = "";
                    if($resultCheck>0){
                        if($row = mysqli_fetch_assoc($result)){
                            $salon = $row["salon"];
                            $horario = $row["horaInicio"]."-".$row["horaFin"]; 
                            $fecha = $row["fecha"];
                        }
                    } 
                    $hash = hash('md5', $curp);
                    //Generador de PDF del examen al aspirante
                    require_once("./../../src/aspirante/pdf/generatepdf.php");
                    $pdf = new myPDF();
                    $nombreA = $nombre." ".$paterno." ".$materno;
                    $salonA = $salon;
                    $horarioA = $horario;
                    $fechaA = $fecha;
                    $pdf->AliasNbPages();
                    $pdf->AddPage('L','A4',0);
                    $pdf->body();
                    $pdf->Output('F', './../../uploads/'.$hash.'.pdf');
                } else{
                    echo "Error en agregar el Alumno";
                }
            }else{
                echo "EL ALUMNO YA HA SIDO REGISTRADO";
                header('Status: 301 Moved Permanently', false, 301);
                // header('Location: ./../../index.html');
                exit();
            }        
        }
    }
?>