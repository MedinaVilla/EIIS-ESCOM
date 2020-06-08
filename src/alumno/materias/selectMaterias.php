<?php
    session_start();
    if(isset($_POST['curses']) || isset($_POST['recurses'])){
        $boleta = $_SESSION['user'];
        if(!empty($_POST['curses'])){
            $curses = $_POST['curses'];
        }
        if(!empty($_POST['recurses'])){
            $recurses = $_POST['recurses'];
        }
        require_once('./../../../config/mysqli_connect.php');
        echo $boleta;
        $sql = "select fecha_intencion from intencion where alumno_boleta='".$boleta."';";
        $result = mysqli_query($conn,$sql);
        $resultCheck = mysqli_num_rows($result);
        if($resultCheck==0){
            $sql = "select count(*) from intencion;";
            $result = mysqli_query($conn,$sql);
            $resultCheck = mysqli_num_rows($result);
            if($resultCheck>0){
                while($row = mysqli_fetch_assoc($result)){
                    $idIntencion = $row['count(*)'] + 1;
                }
                date_default_timezone_set('America/Mexico_City');
                setlocale(LC_TIME, 'es_MX.UTF-8');
                $fec_inten=date("Y-m-d");
                $sql = "INSERT INTO intencion (idintencion, alumno_boleta, fecha_intencion) values ('$idIntencion', '$boleta', '$fec_inten');";
                mysqli_query($conn, $sql);
                
                if(!empty($curses))
                {
                    foreach($curses as $key => $value){
                        $sql = "select * from asignatura where materia='".$value."';";
                        $result = mysqli_query($conn,$sql);
                        $resultCheck = mysqli_num_rows($result);
                        if($resultCheck>0){
                            while($row = mysqli_fetch_assoc($result)){
                                $idMat = $row['idmateria'];
                            }
                            $sql = "INSERT INTO asignatura_intencion (asignatura_idmateria, intencion_idintencion, situacion_idsituacion) values ('$idMat', '$idIntencion', '1');";
                            mysqli_query($conn, $sql);
                        }
                    }
                }

                if(!empty($recurses))
                {
                    foreach($recurses as $key => $value){
                        $sql = "select * from asignatura where materia='".$value."';";
                        $result = mysqli_query($conn,$sql);
                        $resultCheck = mysqli_num_rows($result);
                        if($resultCheck>0){
                            while($row = mysqli_fetch_assoc($result)){
                                $idMat = $row['idmateria'];
                            }
                            $sql = "INSERT INTO asignatura_intencion (asignatura_idmateria, intencion_idintencion, situacion_idsituacion) values ('$idMat', '$idIntencion', '2');";
                            mysqli_query($conn, $sql);
                        }
                    }
                }
            }
            echo 1;
        }
        else{
            echo 0;
        }
    }
?>