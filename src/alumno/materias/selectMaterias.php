<?php
    session_start();
    if(isset($_POST)){
        $boleta = $_SESSION['user'];
        if(!empty($_POST['curses'])){
            $curses = $_POST['curses'];
        }
        if(!empty($_POST['recurses'])){
            $recurses = $_POST['recurses'];
        }
        require_once('./../../../config/mysqli_connect.php');
        $sql = "select fecha_intencion from intencion where alumno_boleta='".$boleta."';";
        $result = mysqli_query($conn,$sql);
        $resultCheck = mysqli_num_rows($result);
        if($resultCheck==0){
            // $sql = "select count(*) from intencion;"; ESTO NO SIRVE!
            // $result = mysqli_query($conn,$sql);
            // $resultCheck = mysqli_num_rows($result);
            // if($resultCheck>0){
                // while($row = mysqli_fetch_assoc($result)){
                    // $idIntencion = $row['count(*)'] + 1;
                // }
                date_default_timezone_set('America/Mexico_City');
                setlocale(LC_TIME, 'es_MX.UTF-8');
                $fec_inten=date("Y-m-d");
                $sql = "insert into intencion (alumno_boleta, fecha_intencion) values ('".$boleta."', '".$fec_inten."');";
                $result = mysqli_query($conn, $sql);
                $sql2 = "select idintencion from intencion where alumno_boleta=".$boleta.";";
                $result = mysqli_query($conn, $sql2);
                $resultCheck = mysqli_num_rows($result);
                $idIntencion=0;
                if($resultCheck>0){
                    if($row = mysqli_fetch_assoc($result)){
                        $idIntencion= $row["idintencion"];
                    }
                } 
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
                            $sql = "insert into asignatura_intencion (asignatura_idmateria, intencion_idintencion, situacion_idsituacion) values (".$idMat.", ".$idIntencion.", 1);";
                            mysqli_query($conn, $sql);
                        }
                    }
                // }

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
                            $sql = "insert into asignatura_intencion (asignatura_idmateria, intencion_idintencion, situacion_idsituacion) values ('".$idMat."',".$idIntencion.", 2);";
                            mysqli_query($conn, $sql);
                        }
                    }
                }
                $sql = "select F2.materia,situacion.situacion FROM (SELECT asignatura.materia,F1.situacion_idsituacion FROM (SELECT asignatura_intencion.asignatura_idmateria,asignatura_intencion.situacion_idsituacion FROM asignatura_intencion INNER JOIN intencion ON intencion.idintencion=asignatura_intencion.intencion_idintencion where intencion.alumno_boleta='".$boleta."')AS F1 inner join asignatura on asignatura.idmateria=F1.asignatura_idmateria)AS F2 inner join situacion on F2.situacion_idsituacion=situacion.idsituacion;";
                $result = mysqli_query($conn,$sql);
                $resultCheck = mysqli_num_rows($result);
                $tabla = [];
                if($resultCheck>0){
                    while($row = mysqli_fetch_assoc($result)){
                        $tabla[] = $row;  // CORREGIDO OTRA COSA QUE NO SIRVE!
                    }
                } 
            echo json_encode($tabla);
            }
        }
        else{
            echo 0;
        }
    }
?>