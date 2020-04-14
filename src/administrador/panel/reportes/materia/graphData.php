<?php 
    if(isset($_POST)){    
        $materia = $_POST["materia"];
        require_once('./../../../../../config/mysqli_connect.php');
        
        $sql = "SELECT F4.materia,F2.inscritos_regular,F4.inscritos_recurse FROM (SELECT F1.materia,count(situacion.situacion)AS inscritos_regular FROM (SELECT asignatura.materia,asignatura_intencion.situacion_idsituacion FROM asignatura 
        INNER JOIN asignatura_intencion ON asignatura.idmateria=asignatura_intencion.asignatura_idmateria where asignatura.materia='Cálculo')AS F1 inner join situacion on F1.situacion_idsituacion=situacion.idsituacion 
        where situacion.situacion='regular')AS F2,(SELECT F3.materia,count(situacion.situacion)AS inscritos_recurse FROM (SELECT asignatura.materia,asignatura_intencion.situacion_idsituacion FROM asignatura 
        INNER JOIN asignatura_intencion ON asignatura.idmateria=asignatura_intencion.asignatura_idmateria where asignatura.materia='".$materia."')AS F3 inner join situacion on F3.situacion_idsituacion=situacion.idsituacion where situacion.situacion='recurse')AS F4;";
        $result = mysqli_query($conn,$sql);
        $resultCheck = mysqli_num_rows($result);
        $materias = [];
        if($resultCheck>0){
            while($row = mysqli_fetch_assoc($result)){
                $materias[] = $row;
            }
        } else echo "Ninguno";
        echo json_encode($materias);
    }
?>