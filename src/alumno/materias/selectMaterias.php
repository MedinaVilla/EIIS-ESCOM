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
            // $sql = "select count(*) from intencion;";
            // $result = mysqli_query($conn,$sql);
            // $resultCheck = mysqli_num_rows($result);
            // if($resultCheck>0){
                // while($row = mysqli_fetch_assoc($result)){
                    // $idIntencion = $row['count(*)'] + 1;
                // }
                date_default_timezone_set('America/Mexico_City');
                setlocale(LC_TIME, 'es_MX.UTF-8');
                $fec_inten=date("Y-m-d");
                echo "boleta a insertar:".$boleta;
                echo "fecha de intecion a insertar:";
                $sql = "insert into intencion (alumno_boleta, fecha_intencion) values ('".$boleta."', '".$fec_inten."');";
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);
                if($resultCheck>0){
                    if($row = mysqli_fetch_assoc($result)){
                        $idIntencion= $row["idintencion"];
                    }
                } 
                echo "WEEEE idIntencion".$idIntencion;

                if(!empty($curses))
                {
                    foreach($curses as $key => $value){
                        $sql = "select * from asignatura where materia='".$value."';";
                        $result = mysqli_query($conn,$sql);
                        $resultCheck = mysqli_num_rows($result);
                        if($resultCheck>0){
                            echo " Inserto curse";
                            while($row = mysqli_fetch_assoc($result)){
                                $idMat = $row['idmateria'];
                            }
                            echo "id_materia a insertar:".$idMat;
                            echo "id_intencion a insergar".$idIntencion;
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
                            echo " Inserto recurse";
                            while($row = mysqli_fetch_assoc($result)){
                                $idMat = $row['idmateria'];
                            }
                            echo "id_materia a insertar:".$idMat;
                            echo "id_intencion a insergar".$idIntencion;
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
                    echo " Intencion FINAL";
                    while($row = mysqli_fetch_assoc($result)){
                        echo json_encode($row);
                    }
                } else echo " Ninguno";
                //echo json_encode($tabla);
            }
            echo json_encode($tabla);
        }
        else{
            echo 0;
        }
    }
?>